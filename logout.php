<?php // line 1 added to enable color highlight

session_start();
unset($_SESSION['name']);
unset($_SESSION['uid']);
header('Location: index.php');
?>