<?php // Do not put any HTML above this line
session_start();

require_once "pdo.php";
if(isset($_GET['id']))
$tid=$_GET['id'];
// Check to see if we have some POST data, if we do process it
     
    $stmt = $pdo->prepare('UPDATE  tasks set start=1 where tid=:fn and uid=:ln');

        $stmt->execute(array(
                ':fn' => $tid,
                ':ln' => $_SESSION['uid'])
        );

        header("Location: dash.php");
        return;
      




?>
