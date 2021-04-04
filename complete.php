<?php 
session_start();

require_once "pdo.php";
if(isset($_GET['id']))
$tid=$_GET['id'];
else {
	header("Location: dash.php");
	return;
}     

    $stmt = $pdo->prepare('UPDATE  tasks set perc=:ng where tid=:fn and uid=:ln');

        $stmt->execute(array(
        		':ng' => 100,
                ':fn' => $tid,
                ':ln' => $_SESSION['uid'])
        );
        $stmt = $pdo->prepare('UPDATE  users set tcomp=tcomp+1  where uid=:ln');

        $stmt->execute(array(
                ':ln' => $_SESSION['uid'])
        );
$_SESSION['comp']=1;
        header("Location: dash.php");
        return;


?>