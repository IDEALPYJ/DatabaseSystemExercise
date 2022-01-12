<?php
include "../public/checkLogin.php";
global $dbh;

$mode = $_GET['mode'];
$text = $_GET['text'];

$sql=null;
if($mode == 'byID'){
    $sql="SELECT * FROM nurse NATURAL JOIN department WHERE nurse.n_id LIKE :text";
}elseif ($mode==='byName'){
    $sql="SELECT * FROM nurse NATURAL JOIN department WHERE nurse.n_name LIKE :text";
}elseif ($mode==='byDeptID'){
    $sql="SELECT * FROM nurse NATURAL JOIN department WHERE department.dept_id LIKE :text";
}elseif ($mode==='byDeptName'){
    $sql="SELECT * FROM nurse NATURAL JOIN department WHERE department.dept_name LIKE :text";
}else{
    echo'模式错误';
}

$res=$dbh->prepare($sql);
$res->bindValue(':text', '%'.$text.'%');
$res->execute();

echo "<table class='table'>";
echo"<thead><tr><th>护士ID</th><th>护士姓名</th><th>所属科室ID</th><th>所属科室名称</th></tr></thead><tbody>";
while($row=$res->fetch())
{
    echo "<tr>
    <td>{$row['n_id']}</td>
    <td>{$row['n_name']}</td>
    <td>{$row['dept_id']}</td>
    <td>{$row['dept_name']}</td>";
    echo "</tr>";
}
echo "</tbody></table>";