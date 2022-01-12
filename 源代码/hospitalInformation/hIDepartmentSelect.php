<?php
include "../public/checkLogin.php";
global $dbh;

$mode = $_GET['mode'];
$text = $_GET['text'];

$sql=null;
if($mode == 'byID'){
    $sql="SELECT * FROM department WHERE dept_id LIKE :text";
}elseif ($mode==='byName'){
    $sql="SELECT * FROM department WHERE dept_name LIKE :text";
}else{
    echo'模式错误';
}

$res=$dbh->prepare($sql);
$res->bindValue(':text', '%'.$text.'%');
$res->execute();

echo "<table class='table'>";
echo"<thead><tr><th>科室ID</th><th>科室名称</th><th>科室电话</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    echo "<tr>
<td>{$row['dept_id']}</td>
<td>{$row['dept_name']}</td>
<td>{$row['dept_phone']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
