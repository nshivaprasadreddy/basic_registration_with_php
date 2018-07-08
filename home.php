<?php 
session_start();

$id = $_SESSION['uid'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>home page</title>
 	<style>
         .blink {
            animation: blinker 2s linear infinite;
            color: green;
            font-weight: 900;
        }

       @keyframes blinker {  
            50% { opacity: 0; }
       }
      </style>
 </head>
 <body>
 
 <br><br><br><br><br>

 <center>

<h2 class="blink">Welcome, You are logged in</h2>
 	<p>Hi, <h3><?php echo $name ?></h3></p>

 	<p>email : <h3><?php echo $email ?></h3></p>

 	<p>phone : <h3><?php echo $phone ?></h3></p>

 	
<h2><span  class="blink">Click here to</span><a href="logout.php"> Logout</a></h2>
 </center>
 </body>
 </html>