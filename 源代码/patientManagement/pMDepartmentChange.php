<?php
include "../public/checkLogin.php";
global $dbh;

$patientID=$_GET['patientID'];
$deptID=$_GET['deptID'];
$doctorID=$_SESSION['doctorID'];
$sickbedID=$_SESSION['sickbedID'];

$sql0="UPDATE sickbed SET s_condi='空闲' WHERE s_id=(SELECT s_id FROM p_s WHERE p_id='$patientID')";
$res0=$dbh->prepare($sql0);
$res0->execute();

$sql02="SELECT * FROM doctor WHERE dr_id='$doctorID' AND dept_id='$deptID'";
$res02=$dbh->prepare($sql02);
$res02->execute();
if($res02->rowCount()===0){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>病人科室与医生科室不匹配</div>";
    return;
}

$sql03="SELECT * FROM sickbed NATURAL JOIN w_s NATURAL JOIN ward WHERE s_id='$sickbedID' AND dept_id='$deptID'";
$res03=$dbh->prepare($sql03);
$res03->execute();
if($res03->rowCount()===0){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>病人科室与病床科室不匹配</div>";
    return;
}

$sql1="UPDATE patient SET dept_id='$deptID' WHERE p_id='$patientID'";
$res1=$dbh->prepare($sql1);
$res1->execute();

$sql2="UPDATE p_dr SET dr_id='$doctorID' WHERE p_id='$patientID'";
$res2=$dbh->prepare($sql2);
$res2->execute();

$sql3="UPDATE p_s SET s_id='$sickbedID' WHERE p_id='$patientID'";
$res3=$dbh->prepare($sql3);
$res3->execute();

$sql4="UPDATE sickbed SET s_condi='在用' WHERE s_id='$sickbedID'";
$res4=$dbh->prepare($sql4);
$res4->execute();

if($res1->rowCount()===1&&$res2->rowCount()===1&&$res3->rowCount()===1&&$res4->rowCount()===1){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>修改成功</div>";
}else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>修改失败</div>";
}

unset($_SESSION['doctorID']);
unset($_SESSION['sickbedID']);