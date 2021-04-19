<?php
session_start();
session_destroy();
header("location:adminlogin.php");

//unset($_SESSION["id"]);