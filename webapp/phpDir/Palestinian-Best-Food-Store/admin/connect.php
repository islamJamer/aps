<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "c2811172727project";

$con = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser, $dbpass);

    if(!$con ) {
        die("Could not connect to database");
        }

    try{
        $con =new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser, $dbpass);
        // echo "Connected Succsessfuly!";
        // echo"<br/><br/><br/>";
        
    }catch(PDOException $e){
        $error_message = $e->getMessage();
        echo $error_message;   
        exit();
    }
?>