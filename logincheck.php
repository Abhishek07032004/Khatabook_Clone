<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $email=$_POST["mail"];
        $number=$_POST["number"];
        $sql="SELECT * FROM `userregister` WHERE `phoneno.`='$number'AND`mailid`='$email'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $row = $result->fetch_assoc();

            $_SESSION['usr'] = $email;
            $_SESSION['nm'] = $row['firstname'] . " " . $row['lastname'];
            header("location:frontpage.php");
        }
        else{
            echo '<script>
            window.location.href="login.php";
            alert("invalid login")</script>';
        
        }
    }
     
?>