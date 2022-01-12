<?php
include "../public/checkLogin.php";
global $dbh;

$ID = $_GET['deptID'];

$sql = "SELECT * FROM doctor WHERE dept_id='$ID'";
$res = $dbh->prepare($sql);
$res->execute();

echo "<table class='table table-hover'>";
echo"<thead><tr><th>医生ID</th><th>医生姓名</th><th>医生电话</th><th>所属科室ID</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    $theID=$row['dr_id'];
    echo "<tr id='{$row['dr_id']}' onclick=\"sendDoctorID(document.getElementById('$theID').id)\">
<td>{$row['dr_id']}</td>
<td>{$row['dr_name']}</td>
<td>{$row['dr_phone']}</td>
<td>{$row['dept_id']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
