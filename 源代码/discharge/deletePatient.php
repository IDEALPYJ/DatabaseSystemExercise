<?php
include "../public/checkLogin.php";
global $dbh;

$ID = $_GET['ID'];

$sql0="SELECT * FROM patient WHERE p_id='$ID'";
$res0=$dbh->prepare($sql0);
$res0->execute();

if($res0->rowCount()===0){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>病人不存在</div>";
}

$sql1="DELETE FROM patient WHERE p_id='$ID'";
$res1=$dbh->prepare($sql1);
$res1->execute();
$sql2="UPDATE sickbed SET s_condi='空闲' WHERE s_id=(SELECT s_id FROM p_s WHERE p_id='$ID')";
$res2=$dbh->prepare($sql2);
$res2->execute();

if($res1->rowCount()===0){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>删除失败</div>";
}

if($res1->rowCount()===1){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>删除成功</div>";
}