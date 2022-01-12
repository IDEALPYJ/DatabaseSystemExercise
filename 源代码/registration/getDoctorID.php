<?php
session_start();
$_SESSION['doctorID']=$_GET['ID'];
echo "当前选择的医生为：".$_SESSION['doctorID'];