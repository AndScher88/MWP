<?php
namespace classes\employee;

use classes\frontend\Table;
use classes\database\DatabaseConnector;
use mysqli_result;

class Employee
{

    public mysqli_result $result;
    public int $emplId;
    public string $vorname;
    public string $nachname;
    public  $gebdatum;
    public string $strasse;
    public string $hausnummer;
    public string $stadt;
    public string $postleitzahl;
    public string $telefonnummer;
    public string $email;
    public  $abteilung;

    public function createEmployeeTable()
    {
        $employee = new Employee();
        $employee->queryEmployees();
        $resultEmployee = $employee->getResult();
        $table = new Table();
        $table->createTable($resultEmployee);
    }

    public function queryEmployees()
    {
        $conn = DatabaseConnector::getAccess();
        $sql ='SELECT * FROM mitarbeiterdaten ORDER BY nachname, vorname';
        $this->result = $conn->query($sql);
        $conn->close();
    }

    public function createEmployees()
    {
        $conn = DatabaseConnector::getAccess();
        $sql = "INSERT INTO mitarbeiterdaten (
                            vorname, nachname, strasse, hausnummer, 
                            stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung)
                VALUES  ('$this->vorname', '$this->nachname', '$this->strasse', '$this->hausnummer', 
                         '$this->stadt', '$this->postleitzahl', '$this->gebdatum', '$this->telefonnummer', '$this->email', '$this->abteilung')";
        if ($conn->query($sql) === TRUE)
        {
            $_SESSION['meldung'] = 'Mitarbeiter wurde erfolgreich hinzugefügt!';
            $_SESSION['alert'] = 'alert-success';
        }
        else
        {
            $_SESSION['meldung'] = 'Einfügen hat nicht geklappt';
            $_SESSION['alert'] = 'alert-danger';
        }
        $conn->close();
    }

    public function queryEmployee()
    {
        $conn = DatabaseConnector::getAccess();
        $sql = "SELECT id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung 
                FROM mitarbeiterdaten WHERE id = '$this->emplId'";
        $this->result = $conn->query($sql);
        $conn->close();
    }

    public function queryUpdateEmployee()
    {
        $conn = DatabaseConnector::getAccess();
        $sql = "UPDATE mitarbeiterdaten 
                SET vorname = '$this->vorname', 
                    nachname = '$this->nachname',
                    strasse = '$this->strasse',
                    hausnummer = '$this->hausnummer',
                    stadt = '$this->stadt',
                    postleitzahl = '$this->postleitzahl',
                    geburtsdatum = '$this->gebdatum',
                    telefonnummer = '$this->telefonnummer',
                    email = '$this->email',
                    abteilung = '$this->abteilung'
                WHERE id = '$this->emplId'";
        $conn->query($sql);
        $conn->close();
    }


    public function queryDeleteEmployee()
    {
        $conn = DatabaseConnector::getAccess();
        $sql = "DELETE FROM mitarbeiterdaten WHERE id = '$this->emplId'";
        $conn->query($sql);
        $conn->close();
    }



    /**
     * @return mysqli_result
     */
    public function getResult(): mysqli_result
    {
        return $this->result;
    }

    /**
     * @param $emplId
     */
    public function setEmplId($emplId): void
    {
        $this->emplId = $emplId;
    }

    /**
     * @param string $vorname
     */
    public function setVorname(string $vorname): void
    {
        $this->vorname = $vorname;
    }

    /**
     * @param mixed $nachname
     */
    public function setNachname($nachname): void
    {
        $this->nachname = $nachname;
    }

    /**
     * @param mixed $gebdatum
     */
    public function setGebdatum($gebdatum): void
    {
        $this->gebdatum = $gebdatum;
    }

    /**
     * @param string $strasse
     */
    public function setStrasse(string $strasse): void
    {
        $this->strasse = $strasse;
    }

    /**
     * @param string $hausnummer
     */
    public function setHausnummer(string $hausnummer): void
    {
        $this->hausnummer = $hausnummer;
    }

    /**
     * @param string $stadt
     */
    public function setStadt(string $stadt): void
    {
        $this->stadt = $stadt;
    }

    /**
     * @param string $postleitzahl
     */
    public function setPostleitzahl(string $postleitzahl): void
    {
        $this->postleitzahl = $postleitzahl;
    }

    /**
     * @param string $telefonnummer
     */
    public function setTelefonnummer(string $telefonnummer): void
    {
        $this->telefonnummer = $telefonnummer;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $abteilung
     */
    public function setAbteilung(string $abteilung): void
    {
        $this->abteilung = $abteilung;
    }

}