<?php if(!isset($_SESSION)) { session_start(); }
$servername="localhost";
$username="root";
$password="";
$db_name="khatabook";
$conn=new mysqli($servername, $username, $password, $db_name, 3307);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
echo "";
?>