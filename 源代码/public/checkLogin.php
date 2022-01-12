<?php
if(!session_id())session_start();

error_reporting(0);

$user=$_SESSION["user"];
$pass=$_SESSION["pass"];

$judge=true;

try{
    $dbh=new PDO('mysql:host=localhost;dbname=hospital',$user,$pass);
}
catch(PDOException $e){
    $judge=false;
}

$_SESSION['judge']=$judge;