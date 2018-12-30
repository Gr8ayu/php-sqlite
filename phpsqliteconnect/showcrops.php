<?php
require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\SQLiteInsert;
use App\SQLiteQuery;

$pdo = (new SQLiteConnection())->connect();
if ($pdo != null)
    //echo 'Connected to the SQLite database successfully!';
    echo "";
else
    echo 'Whoops, could not connect to the SQLite database!';

$sqlite = new SQLiteQuery($pdo);

$data = $sqlite->getCrops();


echo "<table>";
echo "<tr> <th> CropID </th><th>CropName</th><th>cropScientificName</tr>";

foreach ($data as $x => $x_value ){
echo "<tr>";
echo "<td>".$x_value['cropID']."</td><td>".$x_value['cropName']."</td><td>".$x_value['cropScientificName'];
echo "</tr>";

}
echo "</table>";






 ?>
