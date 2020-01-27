<?php
namespace classes\frontend;


use mysqli_result;


class Table
{

    public mysqli_result $result;
    public int $emplId;

    public function createTable($resultEmployee)
    {
        $table = new Table();
        $table->setResult($resultEmployee);
        $table->createTableHead();}

    private function createTableHead(): void
    {
        $head = false;
        while ($results = mysqli_fetch_assoc($this->result)) {
            $this->emplId = $results['id'];
            array_shift($results);
                if ($head === false) {
                    echo '<table class="table table-secondary text-left">' . '<thead>' . '<tr>';
                    foreach (array_keys($results) as $key) {
                        echo '<th>';
                        echo ucfirst($key);
                        echo '</th>';
                    }
                    echo '<th>Edit</th>' . '<th>Delete</th>' . '</tr>' . '</thead>';
                    $head = true;
                }
                echo '<tbody>' . '<tr>';
                foreach ($results as $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '<td><a href="mitarbeiterbearbeiten.php?id=' . $this->emplId . '">
                    <abbr title="Edit">
                    <img src="bilder/edit.png" width="16" height="16" class="d-inline-block align-top" alt="">
                    </abbr></a></td>';
                echo '<td><a href="mitarbeiterloeschen.php?id=' . $this->emplId . '">
                    <abbr title="Delete">
                    <img src="bilder/delete.png" width="16" height="16" class="d-inline-block align-top" alt="">
                    </abbr></a></td>';
                echo '</tr>';
                echo '</tbody>';
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