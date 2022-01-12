<?php
include "checkLogin.php";

if($_SESSION['judge'] == true) {
    echo "您好：" . $_SESSION['user'];
}else{
    echo "您未登录";
}
