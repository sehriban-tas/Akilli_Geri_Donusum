<?php
$dsn="mysql:host=localhost;dbname=geridonus";
$username="root";
$password="";

try{
    $conn= new PDO($dsn,$username,$password,[
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
    ]);
   
} catch(PDOExceptin $e){
    echo"bağlanti hatasi\n";
    echo $e->getMessage();

}
?>