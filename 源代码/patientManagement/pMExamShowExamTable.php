<?php
include "../public/checkLogin.php";
global $dbh;

$ID = $_GET['examID'];

$sql = "SELECT * FROM exam WHERE e_id LIKE :text";
$res = $dbh->prepare($sql);
$res->bindValue(':text', '%'.$ID.'%');
$res->execute();

echo "<table class='table'>";
echo "<thead><tr><th>检查项目ID</th><th>检查项目名称</th><th>检查项目价格</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    echo "<tr>
<td>{$row['e_id']}</td>
<td>{$row['e_name']}</td>
<td>{$row['e_price']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";