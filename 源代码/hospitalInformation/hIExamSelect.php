<?php
include "../public/checkLogin.php";
global $dbh;

$mode = $_GET['mode'];
$text = $_GET['text'];

$sql=null;
if($mode == 'byID'){
    $sql="SELECT * FROM exam WHERE e_id LIKE :text";
}elseif ($mode==='byName'){
    $sql="SELECT * FROM exam WHERE e_name LIKE :text";
}else{
    echo'模式错误';
}

$res=$dbh->prepare($sql);
$res->bindValue(':text', '%'.$text.'%');
$res->execute();

echo "<table class='table'>";
echo"<thead><tr><th>检查项目ID</th><th>检查项目名称</th><th>收费标准（元）</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    echo "<tr>
<td>{$row['e_id']}</td>
<td>{$row['e_name']}</td>
<td>{$row['e_price']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
