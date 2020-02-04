<?php
namespace classes\frontend;


use mysqli_result;

class Table
{

    private mysqli_result $result;
    private int $emplId;
    private $results;
    private bool $head = false;

    public function createTable(): void
    {
        echo '<table class="table table-secondary text-left">';
        while ($this->results = mysqli_fetch_assoc($this->result)) {
            $this->emplId = $this->results['id'];
            array_shift($this->results);
            if ($this->head === false) {
                $this->createTableHead();
                $this->createTableBody();
            }else {
                $this->createTableBody();
            }
        }
        echo '</table>';
    }

    private function createTableHead(): void
    {
        echo '<thead><tr>';
        foreach (array_keys($this->results) as $key) {
            echo '<th>' . ucfirst($key) . '</th>';
        }
        echo '<th>Edit</th><th>Delete</th></tr></thead>';
        $this->head = true;
    }

    private function createTableBody(): void
    {
        echo '<tr>';
        foreach ($this->results as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '<td> <a href="mitarbeiterbearbeiten.php?id=' . $this->emplId . '">
              <img src="bilder/edit.png" width="16" height="16" class="d-inline-block align-top" alt="">
              </td>';
        echo '<td><a href="mitarbeiterloeschen.php?id=' . $this->emplId . '">
              <img src="bilder/delete.png" width="16" height="16" class="d-inline-block align-top" alt=""></td>';
        echo '</tr>';

    }

    /**
     * @param mixed $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }

    /**
     * @return int
     */
    public function getEmplId(): int
    {
        return $this->emplId;
    }

    /**
     * @param int $emplId
     */
    public function setEmplId(int $emplId): void
    {
        $this->emplId = $emplId;
    }

}

