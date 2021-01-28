<?php 
 session_start();

 if(empty($_SESSION['user'])){
     header('Location: login.php');
 }
if(isset($_POST['submit'])){
    echo 'DO It выход';
    session_start();
    session_destroy();
    header('Location: login.php');
}

?>