<?php
include "../public/checkLogin.php";
global $dbh;

$mode = $_GET['mode'];
$text = $_GET['text'];

$sql=null;
if($mode == 'byID'){
    $sql="SELECT * FROM medicine WHERE m_id LIKE :text";
}elseif ($mode==='byName'){
    $sql="SELECT * FROM medicine WHERE m_name LIKE :text";
}else{
    echo'模式错误';
}

$res=$dbh->prepare($sql);
$res->bindValue(':text', '%'.$text.'%');
$res->execute();

echo "<table class='table'>";
echo"<thead><tr><th>药品ID</th><th>药品名称</th><th>药品价格（元）</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    echo "<tr>
<td>{$row['m_id']}</td>
<td>{$row['m_name']}</td>
<td>{$row['m_price']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";

