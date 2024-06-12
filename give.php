<?php session_start();

include "connection.php";

$bid = $_GET['bid'];

$sql = "SELECT sum(`given`) as give FROM `customerdetail` WHERE `business_id`='$bid'";

$result2 = $conn->query($sql);
$row = $result2->fetch_assoc();
$totalGive = $row['give'];