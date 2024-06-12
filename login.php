<?php
    
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="loginstyle.css?ver=1.0">
</head>
<body>
     
    <div class="wrapper">
            <form action="logincheck.php" method="POST">
                
                <h1>Login</h1>
                <hr>
                <div class="username">
                    <input type="text" placeholder="Mail Id" name="mail" required>  
                    
                </div>
                <div class="password">
                    <input type="password" placeholder="Mobile Number" name="number" required>
                     
                </div>
                
                <div class="login-btn">
                    <button type="submit" name="submit">Login</button>
                </div>
            </form>
    </div>
</body>
</html>