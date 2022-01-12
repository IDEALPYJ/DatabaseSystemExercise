<?php
include "../public/checkLogin.php";
global $dbh;

$ID = $_GET['medicineID'];

$sql = "SELECT * FROM medicine WHERE m_id LIKE :text";
$res = $dbh->prepare($sql);
$res->bindValue(':text', '%'.$ID.'%');
$res->execute();

echo "<table class='table'>";
echo "<thead><tr><th>药品ID</th><th>药品名称</th><th>药品库存</th><th>药品价格</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    echo "<tr>
<td>{$row['m_id']}</td>
<td>{$row['m_name']}</td>
<td>{$row['m_inv']}</td>
<td>{$row['m_price']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";