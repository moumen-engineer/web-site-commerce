<?php

include("config.php");

session_start();

$ID = $_GET['id'];   // GET signifie give me from la base de donnees

$start_time = microtime(true);


mysqli_query($con, "DELETE FROM article WHERE id=$ID");


$end_time = microtime(true);



$response_time = $end_time - $start_time;

$_SESSION['response_time'] = $response_time;

header('location: hommes.php');


?>

