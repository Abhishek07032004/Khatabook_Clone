<?php
    include("connection.php");    
         
             
            $Bname=$_POST["Business_name"];
            $email=$_SESSION['usr'];
            $check= "SELECT * FROM `businessdetail` WHERE  `Businessname`='$Bname'";
            $result=$conn->query($check);
            if($result->num_rows==1){
                echo '<script>
                window.location.href="frontpage.php";
                alert("Business name already registered")</script>';
            }
            else{
                $sql="INSERT INTO `businessdetail`(`Businessname`, `mailid`) VALUES ('$Bname','$email')";
                mysqli_query($conn,$sql);
                $_SESSION['name'] = $check;
                header("location:frontpage.php");
            }           
        
    
?>
