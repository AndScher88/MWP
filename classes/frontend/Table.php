<?php
namespace classes\frontend;


use mysqli_result;

class Table
{

    public mysqli_result $result;
    public int $emplId;
    public $results;
    public bool $head = false;

    public function createTableHead(): void
    {
        echo  '<thead>' . '<tr>';
        foreach (array_keys($this->results) as $key) {
            echo '<th>' . ucfirst($key) . '</th>';
        }
        echo '<th>Edit</th>' . '<th>Delete</th>' . '</tr>' . '</thead>';
        $this->head = true;
    }

    public function createTable()
    {
        while ($this->results = mysqli_fetch_assoc($this->result)) {
            $this->emplId = $this->results['id'];
            array_shift($this->results);
            if ($this->head === false) {
                $this->createTableHead();
            }
            echo '<tbody>' . '<tr>';
            foreach ($this->results as $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '<td> <a href="mitarbeiterbearbeiten.php?id=' . $this->emplId . '">
                    <img src="bilder/edit.png" width="16" height="16" class="d-inline-block align-top" alt="">
                    </td>';
            echo '<td> <a href="mitarbeiterloeschen.php?id=' . $this->emplId . '">
                    <img src="bilder/delete.png" width="16" height="16" class="d-inline-block align-top" alt="">
                    </td>';
            echo '</tr>' . '</tbody>';
        }
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
