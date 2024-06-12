<?php
  include('connection.php');
  if(isset($_POST['submit'])){
        $firstname = $_POST["fname"];
        $lirstname = $_POST["lname"];
        $mnumber = $_POST["number"];
        $mailid = $_POST["mail"];
        $checkuser="SELECT * FROM `userregister` WHERE `phoneno.` ='$mnumber' OR `mailid`='$mailid'";
        $result=$conn->query($checkuser);
        if($result->num_rows==1){
          echo '<script>
          window.location.href="index.php";
          alert("Mobile Number or Email are alredy registered")</script>';
       }
       else{
        $sql="INSERT INTO `userregister`(`firstname`, `lastname`, `phoneno.`, `mailid`) VALUES 
        ('$firstname','$lirstname','$mnumber','$mailid')";
        mysqli_query($conn,$sql);
        echo "<script>alert('data success')</script>";
        header("location:login.php");       
       }
      
  }

?>