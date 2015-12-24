<?php
    error_reporting(0);
    define('DB_HOST', 'mysql.hostinger.com.ua');
    define('DB_LOGIN', 'u904267372_petro');
    define('DB_PASSWORD', 'r37379r');
    define('DB_NAME', 'u904267372_order');
    
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
