<?php
session_start();

?>

<!DOCTYPE html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        home
    </title>
    <link rel="stylesheet" type="text/css" href="index.css">
   <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
            
</head>
<body style="background-image:url('bg2.jpg');"> 
    <?php require 'navbar.php' ?>
    <span style="position: relative; left:35%;color:white; font-size: 100px;">Grouper</span>
    <div class="info">
        <p style="color: white;">keep smiling like them..join us</p>
        <br>
      <p><img src="transport.jpg" alt="k" class="image"><img src="smile.jpg" id="image"></p>
      <p id="info" class="normal" style="color:white;">


    </div>
    <div class="about_us">
        <p class="normal" style="color: white;">
            we are a bus management system that categorizes users based on groups.
            it can also function as a monitoring system for parents who want to check about their kids.
        </p>
    </div>
    <hr>
    <div id="contact_us" style="color: white;">
        
        <p style="position: relative;text-align: center;font-size: 30px;"> Contact US</p>
        EMAIL: bussystem@gmail.com<br>
            PHONE NUMBER : 7234826377
    </div>
   
</body>

</html>

