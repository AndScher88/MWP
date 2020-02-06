<?php
namespace classes\frontend;


use classes\employee\Employee;
use mysqli_result;

class Table
{
    private mysqli_result $result;
    private int $emplId;
    private bool $head = false;
    protected $employees;


    public function __construct()
    {
        $this->employees = new Employee();
    }
    
    public function createTable()
    {
        $this->employees->queryAllEmployees();
        $this->result = $this->employees->getResult();
        echo '<table class="table table-secondary text-left">';
        while ($results = mysqli_fetch_assoc($this->result)) {
            $this->emplId = $results['id'];
            array_shift($results);
            if ($this->head === false) {
                $this->createTableHead($results);
            }
            $this->createTableBody($results);
        }
        echo '</table>';
    }

    /**
     * @param array $results
     * @return string
     */
    private function createTableHead(array $results)
    {
        echo '<thead><tr>';
        foreach (array_keys($results) as $key) {
            echo '<th>' . ucfirst($key) . '</th>';
        }
        echo '<th>Edit</th><th>Delete</th></tr></thead>';
        $this->head = true;
    }

    /**
     * @param array $results
     * @return string
     */
    private function createTableBody(array $results)
    {
        echo '<tr>';
        foreach ($results as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo  '<td> <a href="mitarbeiterbearbeiten.php?id=' . $this->emplId . '">
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
}

