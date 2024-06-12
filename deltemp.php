<?php
    include("connection.php");
    $id=$_GET["id"];
    $sql="DELETE FROM `customerdetail` WHERE `customer_id`=$id";
    $result=mysqli_query($conn,$sql);
?>