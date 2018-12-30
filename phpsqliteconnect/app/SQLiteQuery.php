<?php

namespace App;

/**
 * PHP SQLite Insert
 */
class SQLiteQuery {

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


    public function getCrops() {
      $stmt = $this->pdo->query('SELECT cropID, cropName, cropScientificName '
              . 'FROM crops');
      $crops = [];
      while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
          $crops[] = [
              'cropID' => $row['cropID'],
              'cropName' => $row['cropName'],
              'cropScientificName' => $row['cropScientificName']

          ];
      }
      return $crops;
    }

}


 ?>
