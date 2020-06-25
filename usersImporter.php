<?php

require_once 'model/User.php';
require_once "import/UserImporter.php";

$connection = new PDO('mysql:host=localhost;dbname=poke', 'root');
$importer = new UserImporter($connection);

$importer->importFile('resources/users.csv');

header( "Location: http://poker.lt" );

