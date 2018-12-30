<?php

require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\SQLiteInsert;
use App\SQLiteQuery;

$pdo = (new SQLiteConnection())->connect();
if ($pdo != null)
    echo 'Connected to the SQLite database successfully!';
else
    echo 'Whoops, could not connect to the SQLite database!';

$sqlite = new SQLiteInsert($pdo);

$cropName = $cropFamily = $cScientificName = "";

if($_SERVER['REQUEST_METHOD']=="POST"){
$cropName = $_POST['cropName'];
$cScientificName = $_POST['cScientificName'];
$cropFamily = $_POST['cropFamily'];

$id =  $sqlite->insertCrop($cropName,$cScientificName,$cropFamily);
echo "data written with id $id";

include ('showcrops.php');
}



 ?>
