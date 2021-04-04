<?php // Do not put any HTML above this line
session_start();
require_once "pdo.php";
$salt = 'MmAaPpDd*_';

$failure = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['pass']) ) {
  echo "string";
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "Email and password are required";
        header("Location: login.php");
        return;
    }  else if (strpos($_POST['email'], "@") === false) {
        $_SESSION['error'] = "Email must have an at-sign (@)";
        header("Location: login.php");
        return;
    }else {
 $check = hash('md5', $salt . $_POST['pass']);
    $stmt = $pdo->prepare('SELECT uid, uname ,height,weight,tcomp FROM users WHERE email = :em AND password = :pw');

    $stmt->execute(array(':em' => $_POST['email'], ':pw' => $check));


    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row !== false) {

        $_SESSION['name'] = $row['uname'];
$_SESSION['tcomp'] = $row['tcomp'];
        $_SESSION['uid'] = $row['uid'];
       $_SESSION['h'] = $row['height'];$_SESSION['w'] = $row['weight'];
$_SESSION['bmi']=$_SESSION['w']/$_SESSION['h']/$_SESSION['h']*10000;
// Redirect the browser to index.php

        header("Location: index.php");

        return;
    }
             $_SESSION['error'] = "Incorrect password";
            error_log("Login fail ".$_POST['email']." $check");
            header("Location: login.php");
            return;
        
    }
}
?>