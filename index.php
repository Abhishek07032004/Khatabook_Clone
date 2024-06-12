<?php
    include("connection.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="block">
        <h2>Sign up</h2>
        <form  name="formfeed" method="POST" action="signup.php">
            <div class="input">
                <input type="text" placeholder="First Name" id="phone" class="input-box" name="fname" required>
            </div>
            <div class="input">
                <input type="text" placeholder="Last Name" id="Last name" class="input-box" name="lname" required>
            </div>
            <div class="input">
                <input type="number" placeholder="Phone Number" id="Phone Number" class="input-box" name="number" required>
            </div>
            <div class="input">
                <input type="text" placeholder="Mail id" id="Mail id" class="input-box" name="mail"  required >
            </div>
            <h3>Already a member? &ensp; <a href="login.php"> Login</a></h3>
            
            <button type="submit" name="submit" >Sign up</button>
        
        </form>
       
    </section>
   
    <script src="signup.js"></script>
</body>
</html>