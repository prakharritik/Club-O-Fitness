<?php // Do not put any HTML above this line
session_start();

require_once "pdo.php";
$salt = 'MmAaPpDd*_';

$failure = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['name']) && isset($_POST['h']) && isset($_POST['w']) ) {$em=$_POST['email'];
echo $em;
      $stmt = $pdo->prepare('SELECT * FROM users where email = :prof ');
    $stmt->execute(array(":prof" => $_POST['email']));
$rows2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if (sizeof($rows2) > 0) {        $_SESSION['error'] = "Email already exists";
        header("Location: index.php");
        return;
    }else {
$bmi=$_POST['w']/$_POST['h']/$_POST['h']*10000;
    
   $check = hash('md5', $salt . $_POST['pass']);
    $stmt = $pdo->prepare('INSERT INTO users (uname, password, height,weight , email) VALUES (  :fn, :ln, :em, :he, :md)');

        $stmt->execute(array(
                ':fn' => $_POST['name'],
                ':ln' => $check,
                ':em' => $_POST['h'],
                ':he' => $_POST['w'],
                ':md' => $em)
        );
                $_SESSION['name'] = $_POST['name'];

        $_SESSION['uid'] = $pdo->lastInsertId();
          $_SESSION['email']=$_POST['email'];
        $_SESSION['bmi']=$bmi;
        $_SESSION['h']=$_POST['h'];
        $_SESSION['w']=$_POST['w'];
      
        $_SESSION['success'] = "Registered.";
        header("Location: dash.php");
        return;
      

    }  


}
?>
	