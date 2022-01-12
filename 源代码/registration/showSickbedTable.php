<?php
include "../public/checkLogin.php";
global $dbh;

$ID = $_GET['deptID'];

$sql = "SELECT w_id,dept_id,s_id,s_price FROM ward NATURAL JOIN w_s NATURAL JOIN sickbed WHERE dept_id='$ID' and s_condi='空闲'";
$res = $dbh->prepare($sql);
$res->execute();

echo "<table class='table table-hover'>";
echo"<thead><tr><th>病房ID</th><th>所属科室</th><th>病床ID</th><th>病床收费标准</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    $theID=$row['s_id'];
    echo "<tr id='{$row['s_id']}' onclick=\"sendSickbedID(document.getElementById('$theID').id)\">
    <td>{$row['w_id']}</td>
    <td>{$row['dept_id']}</td>
    <td>{$row['s_id']}</td>
    <td>{$row['s_price']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
