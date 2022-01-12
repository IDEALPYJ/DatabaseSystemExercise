<?php
include "../public/checkLogin.php";
global $dbh;

$ID = $_GET['ID'];

$sql1="SELECT * FROM patient WHERE p_id='$ID'";
$sql2="SELECT p_id,p_name,dr_id,dr_name,w_id,s_id,n_id,n_name FROM patient NATURAL JOIN p_dr NATURAL JOIN p_s NATURAL JOIN w_s NATURAL JOIN n_s NATURAL JOIN doctor NATURAL JOIN nurse WHERE p_id='$ID'";
$sql3="SELECT * FROM patient NATURAL JOIN p_m NATURAL JOIN medicine WHERE p_id='$ID'";
$sql4="SELECT * FROM patient NATURAL JOIN p_e NATURAL JOIN exam WHERE p_id='$ID'";
$sql5="SELECT * FROM patient NATURAL JOIN p_cost WHERE p_id='$ID'";
$res1=$dbh->query($sql1);
$res2=$dbh->query($sql2);
$res3=$dbh->query($sql3);
$res4=$dbh->query($sql4);
$res5=$dbh->query($sql5);

if($res1->rowCount()===0){
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>病人不存在</div>";
    return;
}

echo "<h5>病人信息</h5>";
echo "<table class='table'>";
echo "<thead><tr><th>病人ID</th><th>姓名</th><th>性别</th><th>年龄</th><th>身份证号</th><th>科室ID</th></tr></thead><tbody>";
while($row1=$res1->fetch())
{
    echo "<tr>
    <td>{$row1['p_id']}</td>
    <td>{$row1['p_name']}</td>
    <td>{$row1['p_sex']}</td>
    <td>{$row1['p_age']}</td>
    <td>{$row1['p_idno']}</td>
    <td>{$row1['dept_id']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
echo "<br>";

echo "<h5>治疗信息</h5>";
echo "<table class='table'>";
echo "<thead><tr><th>病人ID</th><th>病人姓名</th><th>主治医师ID</th><th>主治医师姓名</th><th>住院病房ID</th><th>住院病床ID</th><th>护士ID</th><th>护士姓名</th></tr></thead><tbody>";
while($row2=$res2->fetch())
{
    echo "<tr>
    <td>{$row2['p_id']}</td>
    <td>{$row2['p_name']}</td>
    <td>{$row2['dr_id']}</td>
    <td>{$row2['dr_name']}</td>
    <td>{$row2['w_id']}</td>
    <td>{$row2['s_id']}</td>
    <td>{$row2['n_id']}</td>
    <td>{$row2['n_name']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
echo "<br>";

echo "<h5>用药信息</h5>";
echo "<table class='table'>";
echo"<thead><tr><th>病人ID</th><th>病人姓名</th><th>药品ID</th><th>药品名称</th><th>药品用量</th><th>药品价格</th></tr></thead><tbody>";
while($row3=$res3->fetch())
{
    echo "<tr>
<td>{$row3['p_id']}</td>
<td>{$row3['p_name']}</td>
<td>{$row3['m_id']}</td>
<td>{$row3['m_name']}</td>
<td>{$row3['dosage']}</td>
<td>{$row3['m_price']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
echo "<br>";

echo "<h5>检查项目信息</h5>";
echo "<table class='table'>";
echo"<thead><tr><th>病人ID</th><th>病人姓名</th><th>查验项目ID</th><th>查验项目名称</th><th>查验项目次数</th><th>查验项目收费标准</th></tr></thead><tbody>";
while($row4=$res4->fetch())
{
    echo "<tr>
<td>{$row4['p_id']}</td>
<td>{$row4['p_name']}</td>
<td>{$row4['e_id']}</td>
<td>{$row4['e_name']}</td>
<td>{$row4['times']}</td>
<td>{$row4['e_price']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
echo "<br>";

echo "<h5>费用信息</h5>";
echo "<table class='table'>";
echo "<thead><tr><th>病人ID</th><th>病人姓名</th><th>预交金额</th><th>应缴费用</th></tr></thead><tbody>";
while ($row5 = $res5->fetch()) {
    echo "<tr>
<td>{$row5['p_id']}</td>
<td>{$row5['p_name']}</td>
<td>{$row5['p_advance']}</td>
<td>{$row5['p_fee']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
echo "<br>";