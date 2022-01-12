<?php
include "../public/checkLogin.php";
global $dbh;

$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$ID=$_GET['ID'];
$name=$_GET['name'];
$age=$_GET['age'];
$sex=$_GET['sex'];
$IDNumber=$_GET['IDNumber'];
$deptID=$_GET['deptID'];
$prePay=$_GET['prePay'];
$doctorID=$_SESSION['doctorID'];
$sickbedID=$_SESSION['sickbedID'];

$sql01="SELECT * FROM patient WHERE p_id='$ID'";
$res01=$dbh->prepare($sql01);
$res01->execute();
if($res01->rowCount()!==0){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>病人ID已存在</div>";
    return;
}

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

$sql1="INSERT INTO patient VALUES ('$ID','$name','$sex','$age','$IDNumber','$deptID')";
$res1=$dbh->prepare($sql1);
$res1->execute();

$sql2="INSERT INTO p_dr VALUES ('$ID','$doctorID')";
$res2=$dbh->prepare($sql2);
$res2->execute();

$sql3="INSERT INTO p_s VALUES ('$ID','$sickbedID')";
$res3=$dbh->prepare($sql3);
$res3->execute();

$sql4="INSERT INTO p_cost VALUES ('$ID','','$prePay')";
$res4=$dbh->prepare($sql4);
$res4->execute();

$sql5="UPDATE sickbed SET s_condi='在用' WHERE s_id='$sickbedID'";
$res5=$dbh->prepare($sql5);
$res5->execute();

if($res1->rowCount()===1){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>登记成功</div>";
}
elseif($res1->rowCount()===0){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>登记失败</div>";
}

unset($_SESSION['doctorID']);
unset($_SESSION['sickbedID']);