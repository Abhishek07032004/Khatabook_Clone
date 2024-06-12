<?php include "connection.php";
    $bid = $_GET['id'];
    $sql="SELECT * FROM `transaction` WHERE `customer_id`=$bid";
    $sql1="SELECT * FROM `customerdetail` WHERE `customer_id`=$bid";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $name = $result1->fetch_assoc();
    $str = $name['name'];
    $sql="SELECT sum(`taken`) as take FROM `transaction` WHERE `customer_id`='$bid'";
    $result2=$conn->query($sql);
    $row = $result2->fetch_assoc();
    $totalTake =  $row['take'];
    $you_will_give=0;
    $you_will_take=0;
    $sql3="SELECT * FROM `customerdetail` WHERE `customer_id`=$bid";
    $result3=$conn->query($sql3);
    $row3= $result3->fetch_assoc();



    $sql = "SELECT sum(`given`) as given FROM `transaction` WHERE `customer_id`='$bid'";

    $result1 = $conn->query($sql);


    
    $row = $result1->fetch_assoc();
    $totalGive =  $row['given'];
    if($totalGive>$totalTake){
        $you_will_take=$totalGive-$totalTake;
        $you_will_give=0;
    }
    elseif($totalGive<$totalTake){
        $you_will_give=$totalTake-$totalGive;
        $you_will_take=0;
    }
    else{
        $you_will_give=0;
        $you_will_take=0;
    }
    

    $sql="UPDATE `customerdetail` SET `given`='$you_will_give',`taken`='$you_will_take' WHERE `customer_id`=$bid";
    $result3 = $conn->query($sql);
   if(isset($_POST['Given'])){
    
        $give = $_POST["amountGiven"];
        $Dis = $_POST["Discription1"];
        $store="INSERT INTO `transaction`(`Transaction_id`, `customer_id`, `name`, `Given`, `Taken`, `datetime`, `Description`) VALUES ('','$bid','$str','$give','0',NOW(),'$Dis')";

        
        mysqli_query($conn,$store);
        header("Refresh:0");
    }
    if(isset($_POST['Taken'])){
    
        $Take = $_POST["amountTaken"];
        $Dis = $_POST["Discription2"];
        $store="INSERT INTO `transaction`(`Transaction_id`, `customer_id`, `name`, `Given`, `Taken`, `datetime`, `Description`) VALUES ('','$bid','$str','0','$Take',NOW(),'$Dis')";
        mysqli_query($conn,$store);
        header("Refresh:0");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="Historystyle.css?ver=6.9">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script>
        function showmodalGiven(){
            document.querySelector('.overlay').classList.add('showoverlay');
            document.querySelector('.Givenform').classList.add('showloginform');
            //document.getElementById("display").innerHTML ="Enter Amount You Give";
}
        function showmodalTaken(){
                    document.querySelector('.overlay').classList.add('showoverlay');
                    document.querySelector('.Takenform').classList.add('showloginform');
                    //document.getElementById("display").innerHTML ="Enter Amount You Get";
        }
        function back(){
           window.location.href = "frontpage.php";
            
        }
        function back1(){
            
                var bid = <?php echo json_encode($bid); ?>;
            window.location.href = "History.php?id=" + bid;
            


            
        }
        function sendmail(bid) {
                const xobj = new XMLHttpRequest();
                xobj.onreadystatechange = function() {
                if (xobj.readyState === 4 && xobj.status === 200) {

                    alert("send");


        }
    };
    xobj.open("GET", "mail.php?id=" + bid, true);
    xobj.send();
}

 
     </script>
    
</head>
<body>  
    <Header>
        
    <h2> <span style="cursor:pointer color:white" onclick=back()><i style="cursor:pointer"class="fa-solid fa-arrow-left"></i></span><h2><?php echo $row3['name'];?>'s Transactions</h2></h2><br>

    </Header>
    <section>
       <article>
        
        <div class="total">
            
            <div class="give">
               <h2 style= color:red> You'll Give:- <?php echo $you_will_give; ?></h2>
                
            </div>
            <div class="got">
                <h2 style= color:green> You'll Get:-<?php echo $you_will_take; ?></h2>
            </div>

            <?php if ($you_will_take > 0) { ?>
                <div class="mail">
                    <a href="mail.php?bid=<?php echo $bid?>">Send Reminder</a>
                </div>
    
            <?php } ?>
        

        </div>
    </article>
    </section>
    <hr>
    <style>
        th{
            padding: 10px;
            text-align: left;
        }
        td{ 
            padding: 10px;
        }
    </style>
    <div class="entries">
    <table border="0" style="padding: 10px; width: 100%">
        <tr style="background-color: #f0f0f0;">
            <th style="width: 20%">Time stamp</th>
            <th>Description</th>    
            <th style="width: 10%; text-align: right">Given</th>
            <th style="width: 10%; text-align: right">Taken</th>
        </tr>
    <?php while($row = $result->fetch_assoc()){?>
        <tr>
            <td>
                
                <?php echo $row['datetime'] . "<br>";?>
            </td>
            <td>
                <?php echo $row['Description'];?>
            </td>
            <td style="color: red; font-weight: bold; text-align: right">
               </span> <?php echo $row['Given'];?>.00 /-
            </td>
            <td style="color: green; font-weight: bold; text-align: right">
               </span><?php echo $row['Taken'];?>.00 /-
            </td>
        </tr>
        <tr>
            <td colspan="4" style="padding: 0px; height: 1px; background-color: #C0C0C0"></td>
        </tr>
    <?php } ?>
</table> 
    </div>
    <div class="overlay"></div>  
    <div class="Givenform" >
        <form method="POST">
        <i class="fa-solid fa-arrow-left-long" onclick="back1()"></i>
             <h2>Given amount</h2>
             <hr style="margin-bottom:30px">
             <div class="fdata">
                <div>
                    <label for="amount">Enter Amount:</label>
                    <input type="text" name="amountGiven" required>
                </div>
                <div>
                    <label for="amount">Enter Description:</label>
                    <input type="text" name="Discription1" required>
                </div>
            </div>    
            <button type="submit" name=" Given">Add</button>
            
        </form>
    </div>
     <div class="overlay"></div>  
    <div class="Takenform" >
        <form method="POST">
        <i class="fa-solid fa-arrow-left-long" onclick="back1()"></i>
             <h2>Taken amount</h2>
             <hr style="margin-bottom:30px">
            <div class="fdata">
                <div>
                    <label for="amount">Enter Amount:</label>
                    <input type="text" name="amountTaken" required>
                </div>
                <div>
                    <label for="amount">Enter Description:</label>
                    <input type="text" name="Discription2" required>
                </div>
            </div>    
            <button type="submit" name="Taken">Add</button>
        </form>
    </div> 
    <footer>
        <button type="submit" name="Give" id="give" onclick="showmodalGiven()">You Give</button>
        <button type="submit" name="Get" id="get" onclick="showmodalTaken()">You Get</button>

    </footer>


    
    
</body>
</html>