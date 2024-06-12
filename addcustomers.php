<?php session_start();

include "connection.php";
//$bid = $_GET['bid'];
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $given=$_POST['email'];
    $taken=$_POST['taken'];
    $bid = $_GET['bid'];
    
    
   // INSERT INTO `transaction`(`Transaction_id`, `customer_id`, `name`, `email`, `Given`, `Taken`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')

    $sql="INSERT INTO `customerdetail`(`customer_id`, `name`, `business_id`, `Email`, `Address`) VALUES ('','$name','$bid','$given ','$taken')";   
    mysqli_query($conn,$sql);
    header("location:frontpage.php");

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addcustomersstyle.css?ver=1.8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav>
        <span>>> Add Customers</span>
    </nav>
    <form method="POST">
        <div class="container">
                <div class="left">
                  <label for="">Customer Name</label>
                    <br>
                    <br>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="name">
                    <br>
                    <br>
                    <br>
  
                    <br>
                    <label for="email">Customer Email</label>
                    <br>
                    <br>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" name="email">
                </div>
                <div class="center">
                    <img src="addcustomersimage.jpg" alt="">
                </div>
                <div class="right">
                    <label for="number">Contact Number</label>
                    <br><br>
                    <i class="fa-solid fa-mobile"></i>
                    <input type="Number" name="given" id="">
                    <br>
                    <br>
                    <br>
                    <br>
                    <label for="">Address</label>
                    <br><br>
                    <i class="fa-solid fa-location-dot"></i>
                    <input type="text" name="taken" id="">

                </div>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
    
</body>
</html>