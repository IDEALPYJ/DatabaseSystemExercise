<?php

include "../public/checkLogin.php";
global $dbh;

if(!isset($_SESSION['patientID'])){
    return;
}

$patientID=$_SESSION['patientID'];

$mode=$_GET['mode'];
$sql=NULL;

if($mode==="main"){
    $sql="SELECT * FROM patient WHERE p_id LIKE :text";
}elseif ($mode==="doctor"){
    $sql="SELECT * FROM patient NATURAL JOIN p_dr NATURAL JOIN doctor WHERE p_id LIKE :text";
}elseif ($mode==="medicine"){
    $sql="SELECT * FROM patient NATURAL JOIN p_m NATURAL JOIN medicine WHERE p_id LIKE :text";
}elseif ($mode==="exam"){
    $sql="SELECT * FROM patient NATURAL JOIN p_e NATURAL JOIN exam WHERE p_id LIKE :text";
}elseif ($mode==="fee"){
    $sql="SELECT * FROM patient NATURAL JOIN p_cost WHERE p_id LIKE :text";
}

$res=$dbh->prepare($sql);
$res->bindValue(':text', '%'.$patientID.'%');
$res->execute();

echo "<table class='table'>";
if($mode==="main"){
    echo"<thead><tr><th>病人ID</th><th>病人姓名</th><th>病人性别</th><th>病人年龄</th><th>病人身份证号</th><th>科室ID</th></tr></thead><tbody>";
    while($row=$res->fetch())
    {
        echo "<tr>
<td>{$row['p_id']}</td>
<td>{$row['p_name']}</td>
<td>{$row['p_sex']}</td>
<td>{$row['p_age']}</td>
<td>{$row['p_idno']}</td>
<td>{$row['dept_id']}</td>";
        echo "</tr>";
    }
}elseif ($mode==="doctor"){
    echo"<thead><tr><th>病人ID</th><th>病人姓名</th><th>医生ID</th><th>医生姓名</th><th>科室ID</th></tr></thead><tbody>";
    while($row=$res->fetch())
    {
        echo "<tr>
<td>{$row['p_id']}</td>
<td>{$row['p_name']}</td>
<td>{$row['dr_id']}</td>
<td>{$row['dr_name']}</td>
<td>{$row['dept_id']}</td>";
        echo "</tr>";
    }
}elseif ($mode==="medicine"){
    echo"<thead><tr><th>病人ID</th><th>病人姓名</th><th>药品ID</th><th>药品名称</th><th>药品用量</th><th>药品价格</th></tr></thead><tbody>";
    while($row=$res->fetch())
    {
        echo "<tr>
<td>{$row['p_id']}</td>
<td>{$row['p_name']}</td>
<td>{$row['m_id']}</td>
<td>{$row['m_name']}</td>
<td>{$row['dosage']}</td>
<td>{$row['m_price']}</td>";
        echo "</tr>";
    }
}elseif ($mode==="exam"){
    echo"<thead><tr><th>病人ID</th><th>病人姓名</th><th>查验项目ID</th><th>查验项目名称</th><th>查验项目次数</th><th>查验项目收费标准</th></tr></thead><tbody>";
    while($row=$res->fetch())
    {
        echo "<tr>
<td>{$row['p_id']}</td>
<td>{$row['p_name']}</td>
<td>{$row['e_id']}</td>
<td>{$row['e_name']}</td>
<td>{$row['times']}</td>
<td>{$row['e_price']}</td>";
        echo "</tr>";
    }
}elseif ($mode==="fee") {
    echo "<thead><tr><th>病人ID</th><th>病人姓名</th><th>预交金额</th><th>应缴费用</th></tr></thead><tbody>";
    while ($row = $res->fetch()) {
        echo "<tr>
<td>{$row['p_id']}</td>
<td>{$row['p_name']}</td>
<td>{$row['p_advance']}</td>
<td>{$row['p_fee']}</td>";
        echo "</tr>";
    }
}
echo "</tbody></table>";
