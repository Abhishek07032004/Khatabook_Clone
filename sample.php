<?php include "connection.php";
if(isset($_SESSION['usr'])){
?>
    include("connection.php");
    if(isset($_POST['submit'])){
        $Bname=$_POST["Business_name"]; 
        echo $_SESSION['mailid'];
        $bus="INSERT INTO `business`(`BusinessName`, `Email`, `Mobile`, `BusinessID`) VALUES ('$Bname', 'bishtbhufi', '28429d829o5','2wxxxwf')";
        mysqli_query($conn,$bus);
    }


<?php } else {
    header("Location: welcome.php");
} 
?>