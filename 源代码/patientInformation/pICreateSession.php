<?php
session_start();
$patientID=$_GET['patientID'];
$_SESSION['patientID']=$patientID;
