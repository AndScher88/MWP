<?php
namespace classes\frontend;

use mysqli_result;


class Table
{

    public mysqli_result $result;
    public int $empl_id;

    public function createTableHead(): void
    {
        $keys = mysqli_fetch_assoc($this->result);
        echo '<table class="table table-secondary text-left">';
        echo '<thead>';
        echo '<tr>';
        array_shift($keys);
        foreach (array_keys($keys) as $key) {
                    echo '<th>';
                    echo ucfirst($key);
                    echo '</th>';
                }
                echo '<th></th>';
                echo '<th></th>';
        echo '</tr>';
        echo '</thead>';
    }


    public function createTableBody(): void
    {
        $results = mysqli_fetch_all($this->result);
        echo '<tbody>';
        foreach ($results as $record) {
            echo '<tr>';
            $this->empl_id = $record[0];
            array_shift($record);
            foreach ($record as $value) {
                echo '<td>';
                echo $value;
                echo '</td>';
            }
            echo '<td><a href="mitarbeiterbearbeiten.php?id=' . $this->empl_id . '"><abbr title="Edit"><i class="fas fa-edit fa-lg" ></i></abbr></a></td>';
            echo '<td><a href="mitarbeiterloeschen.php?id=' . $this->empl_id . '"><abbr title="Delete"><i class="fas fa-dumpster fa-lg"></i></abbr></a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
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
        return $this->empl_id;
    }

    /**
     * @param int $empl_id
     */
    public function setEmplId(int $empl_id): void
    {
        $this->empl_id = $empl_id;
    }

}