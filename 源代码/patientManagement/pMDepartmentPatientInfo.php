<?php
include "../public/checkLogin.php";
global $dbh;

$patientID=$_GET['patientID'];

$sql="SELECT p_id,p_name,dept_id,dr_id,s_id FROM patient NATURAL JOIN p_dr NATURAL JOIN p_s WHERE p_id='$patientID'";
$res=$dbh->prepare($sql);
$res->execute();

echo "<h5>病人信息</h5>";
echo "<table class='table'>";
echo"<thead><tr><th>病人ID</th><th>病人姓名</th><th>科室ID</th><th>主治医师ID</th><th>病床ID</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    echo "<tr>
<td>{$row['p_id']}</td>
<td>{$row['p_name']}</td>
<td>{$row['dept_id']}</td>
<td>{$row['dr_id']}</td>
<td>{$row['s_id']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
