<?php
require 'controller.php';
$_SESSION = [];
session_start();
session_destroy();
header("Location: login.php");
?>