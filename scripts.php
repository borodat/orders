<?php
//   error_reporting(0);
    define('DB_HOST', 'localhost');
    define('DB_LOGIN', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'budcentr_cards');
    
    $cnn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
    if(!$cnn){
        echo 'EROOR: cannot connect to the database.';
    }

    session_start();
    if(isset($_GET['do'])){
        if($_GET['do'] == 'logout'){
            unset($_SESSION['admin']);
            session_destroy();
        }
    }
    if(!$_SESSION['admin']){
        header("Location: enter.php");
        exit;
    }
