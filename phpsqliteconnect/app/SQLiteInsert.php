<?php

namespace App;

/**
 * PHP SQLite Insert
 */
class SQLiteInsert {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    /**
     * Insert a new crop into the tasks table
     * @param type $cropName
     * @param type $cropScientificName
     * @param type $cropFamily
     * @return int id of the inserted task
     */
    public function insertCrop($cropName, $cropScientificName, $cropFamily) {
        $sql = 'INSERT INTO crops(cropName, cropScientificName, cropFamily) '
                . 'VALUES(:cropName,:cropScientificName,:cropFamily)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':cropName' => $cropName,
            ':cropScientificName' => $cropScientificName,
            ':cropFamily' => $cropFamily,
        ]);
        
        return $this->pdo->lastInsertId();
    }

}


 ?>
