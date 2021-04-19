<?php
if (isset($_REQUEST["id"]))
{
    session_start();
    $_SESSION["houses"][] = (int)$_REQUEST["id"];//adding ids
}
header("location:sales.php");
