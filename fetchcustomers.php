<?php session_start();

include "connection.php";

$bid = $_GET['bid'];

$sql = "select * from customerdetail where business_id ='$bid'";

$result = $conn->query($sql);

 

$sql = "SELECT sum(`taken`) as take FROM `customerdetail` WHERE `business_id`='$bid'";

$result1 = $conn->query($sql);

$row = $result1->fetch_assoc();
$totalTake =  $row['take'];

$sql = "SELECT sum(`given`) as give FROM `customerdetail` WHERE `business_id`='$bid'";

$result2 = $conn->query($sql);
$row = $result2->fetch_assoc();
$totalGive = $row['give'];
$i = 0;
$dt = array();
while($row = $result->fetch_assoc()){
    $dt[] = $row;
}

$data = array(
    'totalGive' => $totalGive,
    'totalTake' =>$totalTake,
    'totalRecord' => $dt,
);
echo json_encode($data);
?>
