<?php
include "../public/checkLogin.php";
global $dbh;

$patientID=$_GET['patientID'];
$examID=$_GET['examID'];

$sql0="SELECT p_id,e_id FROM p_e WHERE p_id='$patientID' AND e_id='$examID'";
$res0=$dbh->prepare($sql0);
$res0->execute();
$res=null;
if($res0->rowCount()===0){
    $sql="INSERT INTO p_e VALUES ('$patientID','$examID',1)";
    $res = $dbh->prepare($sql);
    $res->execute();
}
elseif ($res0->rowCount()===1){
    $sql="UPDATE p_e SET times=times+1 WHERE p_id='$patientID' AND e_id='$examID'";
    $res=$dbh->prepare($sql);
    $res->execute();
}

$sql2="UPDATE p_cost SET p_fee=p_fee+(SELECT e_price FROM exam WHERE e_id='$examID') WHERE p_id='$patientID'";
$res2=$dbh->prepare($sql2);
$res2->execute();

if($res->rowCount()===1){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>检查项目开具成功</div>";
}else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>检查项目开具失败</div>";
}
