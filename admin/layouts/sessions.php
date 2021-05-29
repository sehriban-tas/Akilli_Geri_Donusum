<?php
session_start();
require("db.php");
if(!isset($_SESSION['login'])){
    header("location:../login.php?action=urnotauthorized");
}
?>