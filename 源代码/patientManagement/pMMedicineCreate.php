<?php
include "../public/checkLogin.php";
global $dbh;

$patientID=$_GET['patientID'];
$dosage=$_GET['dosage'];
$medicineID=$_GET['medicineID'];

$sql0="SELECT p_id,m_id FROM p_m WHERE p_id='$patientID' AND m_id='$medicineID'";
$res0=$dbh->prepare($sql0);
$res0->execute();
$res=null;

if($res0->rowCount()===0){
    $sql="INSERT INTO p_m VALUES ('$patientID','$medicineID','$dosage')";
    $res = $dbh->prepare($sql);
    $res->execute();
}
elseif ($res0->rowCount()===1){
    $sql="UPDATE p_m SET dosage=dosage+'$dosage' WHERE p_id='$patientID' AND m_id='$medicineID'";
    $res=$dbh->prepare($sql);
    $res->execute();
}

$sql2="UPDATE p_cost SET p_fee=p_fee+(SELECT m_price FROM medicine WHERE m_id='$medicineID')*$dosage WHERE p_id='$patientID'";
$res2=$dbh->prepare($sql2);
$res2->execute();

if($res->rowCount()===1){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>开药成功</div>";
}else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>开药失败</div>";
}
