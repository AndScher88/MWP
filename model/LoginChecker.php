<?php

namespace model;

//error_reporting(0);
require '../model\DatabaseConnector.php';

use RuntimeException;
use mysqli;

/**
 * Class LoginChecker
 * @package classes\database
 */
class LoginChecker
{
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $pwd;
    /**
     * @var
     */
    private $stmtId;
    /**
     * @var
     */
    private $stmtLoginName;
    /**
     * @var
     */
    private $stmtIdMitarbeiter;
    /**
     * @var
     */
    private $stmtPwdHash;
    /**
     * @var
     */
    private $stmtBlocked;
    /**
     * @var
     */
    private $stmt;
    /**
     * @var
     */
    private $mysqli;
    /**
     *
     */
    private const COST = 13;
    /**
     *
     */
    private const PEPPER = ';a0sdbn.ui$%Dbzti/&%/()#(hj§pü';
    /**
     * @var
     */
    private $valid;
    /**
     * @var
     */
    private  $realUsername;

    /**
     * LoginChecker constructor.
     * @param string $user
     * @param string $pwd
     */
    public function __construct(string $user, string $pwd)
    {
        $this->user = $user;
        $this->pwd = $pwd;

    }


    /**
     * @return mixed
     */
    public function loginUser()
    {
        try {
            $this->checkUser();
        } catch (RuntimeException $exception) {
            throw $exception;
        }

        try {
            $this->getAccountData();
        } catch (RuntimeException $exception) {
            throw $exception;
        }

        if ($this->stmtBlocked === 1) {
            throw new RuntimeException('Juuuunge, verschwinde du bist blockiert.');
        }

        try {
            $this->checkPwd();
        } catch (RuntimeException $exception) {
            throw $exception;
        }

        try {
            $this->ret = $this->getUserData();
        } catch (RuntimeException $exception) {
            throw $exception;
        }
        return $this->ret;
    }

    /**
     *
     */
    private function checkUser()
    {
        if (!preg_match('#^[a-z]+$#', $this->user)) {
            throw new RuntimeException('Juuuuuuunge gib mal richtigen User ein!!!');
        }
    }

    /**
     *
     */
    private function getAccountData()
    {
        try {
            $this->mysqli = DatabaseConnector::getAccess();
        } catch (RuntimeException $exception) {
            throw $exception;
        }

        $this->stmt = $this->mysqli->stmt_init();
        $this->checkPrep = $this->stmt->prepare('SELECT id, loginname, pwdhash, blocked, idmitarbeiter FROM account WHERE loginname=? LIMIT 1');
        $this->checkBind = $this->stmt->bind_param('s', $this->user);
        $this->checkExec = $this->stmt->execute();
        $this->stmt->bind_result($this->stmtId, $this->stmtLoginName, $this->stmtPwdHash, $this->stmtBlocked, $this->stmtIdMitarbeiter);
        $this->stmt->fetch();
        if (($this->checkPrep || $this->checkBind || $this->checkExec) === false) {
            $this->stmt->close();
            $this->mysqli->close();
            throw new RuntimeException('Konnte Query nicht ausführen');
        }

        $this->stmt->close();
        $this->mysqli->close();

        if ($this->stmtId <= 0) {
            throw new RuntimeException('Juuuuuuunge' . $this->stmt->error . 'gib mal richtigen User ein!!!');
        }
    }


    /**
     *
     */
    private function checkPwd()
    {
        //Password Definition: 8-20 Zeichen, Groß-und Kleinschreibung A-Z erlaubt, Zahlen erlaubt
        //Sonderzeichen erlaubt: Plus, Minus, Sternchen, Hashtag, At, Prozent
        // Verboten: Leerzeichen, alle anderen Sonderzeichen
        if (!preg_match('/^[\w*#@%+-]{8,20}$/', $this->pwd)) {
            throw new RuntimeException('Juuuuuuunge gib mal richtiges Password ein4!!!');
        }
        if (!password_verify($this->pwd . self::PEPPER, $this->stmtPwdHash)) {
            throw new RuntimeException('Juuuuuuunge gib mal richtiges Password ein6!!!');
        }

        if (password_needs_rehash($this->stmtPwdHash, PASSWORD_BCRYPT, [
            'cost' => self::COST
        ])) {
            $this->newHashDB = password_hash($this->pwd . self::PEPPER, PASSWORD_BCRYPT, [
                'cost' => self::COST
            ]);

            try {
                $this->mysqli = DatabaseConnector::getAccess();
            } catch (RuntimeException $exception) {
                throw new RuntimeException('Juuuuuuunge gib mal richtiges Password ein8!!!');
            }

            $this->stmt = $this->mysqli->stmt_init();
            $this->checkPrep = $this->stmt->prepare('UPDATE account SET pwdhash=? WHERE loginname=? LIMIT 1');
            $this->checkBind = $this->stmt->bind_param('ss',$this->newHashDB, $this->user);
            $this->checkExec = $this->stmt->execute();
            if (($this->checkPrep || $this->checkBind || $this->checkExec) === false) {
                $this->stmt->close();
                $this->mysqli->close();
                throw new RuntimeException('Konnte Query nicht ausführen2');
            }
            $this->stmt->close();
            $this->mysqli->close();
        }

        //Login ist erfolgreich



    }

    /**
     * @return mixed
     */
    private function getUserData()
    {
        try {
            $this->mysqli = DatabaseConnector::getAccess();
        } catch (RuntimeException $exception) {
            throw new RuntimeException('Juuuuuuunge gib mal richtiges Password ein8!!!');
        }

        $this->stmt = $this->mysqli->stmt_init();
        $this->checkPrep = $this->stmt->prepare('SELECT vorname FROM mitarbeiterdaten WHERE id=? LIMIT 1');
        $this->checkBind = $this->stmt->bind_param('s', $this->stmtIdMitarbeiter);
        $this->checkExec = $this->stmt->execute();
        $this->stmt->bind_result($this->realUsername);
        $this->stmt->fetch();
        if (($this->checkPrep || $this->checkBind || $this->checkExec) === false) {
            $this->stmt->close();
            $this->mysqli->close();
            throw new RuntimeException('Konnte Query nicht ausführen5');
        }

        $this->stmt->close();
        $this->mysqli->close();

        if ($this->stmtId <= 0) {

            throw new RuntimeException('Kein User gefunden!');
        }
        $this->valid = true;
        return $this->realUsername;

    }
}

/*
    private function checkIP()
    {

    }
*/
