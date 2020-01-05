<?php

 $dbhost = "localhost";
 $dbuser = "Adithya";
 $dbpass = "password";
 $db = "bus";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 

if($conn==false){
	die("Error");
}
   
 ?>
