<?php
include('private/conn.php');
session_start();
session_destroy();
header("location:".site_root."admin/login.php");
?>