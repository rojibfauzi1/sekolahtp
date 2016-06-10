<?php
session_start();
unset($_SESSION['login']);
header("Refresh: 0; URL=../user/index.php");

?>