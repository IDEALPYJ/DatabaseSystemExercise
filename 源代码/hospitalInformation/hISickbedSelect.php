<?php
include "../public/checkLogin.php";
global $dbh;

$mode = $_GET['mode'];
$text = $_GET['text'];

$sql=null;
if($mode == 'byID'){
    $sql="SELECT * FROM ward NATURAL JOIN w_s NATURAL JOIN sickbed WHERE sickbed.s_id LIKE :text";
}elseif ($mode==='byDept'){
    $sql="SELECT * FROM ward NATURAL JOIN w_s NATURAL JOIN sickbed WHERE ward.dept_id LIKE :text";
}elseif ($mode==='byCondi'){
    $sql="SELECT * FROM ward NATURAL JOIN w_s NATURAL JOIN sickbed WHERE sickbed.s_condi LIKE :text";
}else{
    echo'模式错误';
}

$res=$dbh->prepare($sql);
$res->bindValue(':text', '%'.$text.'%');
$res->execute();

echo "<table class='table'>";
echo"<thead><tr><th>病房ID</th><th>所属科室</th><th>病床ID</th><th>病床收费标准</th><th>病床状态</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    echo "<tr>
    <td>{$row['w_id']}</td>
    <td>{$row['dept_id']}</td>
    <td>{$row['s_id']}</td>
    <td>{$row['s_price']}</td>
    <td>{$row['s_condi']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";
