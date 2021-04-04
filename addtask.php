<?php // Do not put any HTML above this line
session_start();

require_once "pdo.php";


// Check to see if we have some POST data, if we do process it
if ( isset($_POST['task']) && isset($_POST['duration'])) {
     
    $stmt = $pdo->prepare('INSERT INTO tasks (uid, dur,title) VALUES (  :fn, :ln, :em)');

        $stmt->execute(array(
                ':fn' => $_SESSION['uid'],
                ':ln' => $_POST['duration'],
                ':em' => $_POST['task'])
        );
             

"Registered.";
        header("Location: dash.php");
        return;
      
    }  




?>
