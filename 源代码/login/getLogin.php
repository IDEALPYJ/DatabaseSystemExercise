<?php
session_start();
$_SESSION['user']=$_POST['username'];
$_SESSION['pass']=$_POST['password'];

include '../public/checkLogin.php';

if($_SESSION['judge']===true){
    header('Location:../patientInformation/pIMain.html');
}else{
    echo "<script>alert('用户名或密码错误，请重试');location.href='login.html'</script>;";
}