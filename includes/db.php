<?php

$username = "";
$name = "";
$surname = "";
$email = "";
$errors = array();

//Prijungiam prie duomenų bazės
$db = mysqli_connect('localhost', 'root', '', 'poke');
