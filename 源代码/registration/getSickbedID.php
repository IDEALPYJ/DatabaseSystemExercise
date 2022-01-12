<?php
session_start();
$_SESSION['sickbedID']=$_GET['ID'];
echo "当前选择的病床为：".$_SESSION['sickbedID'];