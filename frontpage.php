<?php include "connection.php";
if(isset($_SESSION['usr'])){
    $email=$_SESSION['usr'];
    $sql="SELECT * FROM `businessdetail` where `mailid`='$email'";
    $result=mysqli_query($conn,$sql);
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['nm'];?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="frontpagedecore.css?ver=4.2">
</head>
<body>
    <nav>
        <div class="logo"> 
            <span><img  src="logo.png" alt=""></span>
        </div>
        <div class="username">
            <!-- <span><input type="text" placeholder="USERNAME"></span> -->
            <span>Welcome to khatabook!!</span>
            <?php echo $_SESSION['nm'];?>   
        </div>
        <div class="logout" >
            <a href="logout.php">logout?</a>
        </div>
    </nav>
    <div class="main">
        <div class="first">
            <div class="nav1">
                <span><h3>
                    Business Section
                </h3></span>
            </div>
            <div class="add">
                <div class="Bname">

                <?php while($row = $result->fetch_assoc()){?>
                <div class="customer_detail" onclick="checkajax('<?php echo $row['Business_id'];?>'); ">
                    <?php echo $row['Businessname'];?>
                    
                </div>
                <?php }?>
                </div>
                <input type="button" value="+Add Business"  onclick="showmodal()">
            </div>


        </div>
        <div class="second">
            <div class="nav2">
            <div class="Give">
                    <span><h2>You'll Give: :-</h2>
                        <div class="give" id="give">
                            
                        </div>
                        
                    </span>
                </div>    
            <div class="get">
                    
                    <span style= color:green><h2>You'll Get:-</h2>
                        <div class="get" id="get"></div>
                    </span>
                </div>
                
            </div>
            <div  id="display_here">
                
            </div>
            
            
        </div>
    </div>  
    <div class="overlay"></div>  
    <div class="loginform" >
        <form method="POST" action="AddBusiness.php" >
        <i class="fa-solid fa-arrow-left-long" onclick=back()></i>
            <h2 style="text-align: center;"> Add Business</h2>
            <div class=inp>
                <label for="">Enter Business Name:</label><br>
                <i class="fa-solid fa-building"></i>
                <input type="text" name="Business_name" required>
            </div>
            <button type=submit class="create">Create</button>
             
            
        </form>
    </div> 
    <script src="front.js?ver=5.9"></script>
</body>
</html> 

<?php } else {
    header("Location: welcome.php");
} ?>