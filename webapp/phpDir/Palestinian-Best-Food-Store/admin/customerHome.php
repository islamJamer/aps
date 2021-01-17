<?php
    session_start();
    $pageTitle = 'Home Page';
    // print_r($_SESSION['Username']);
    include 'init.php';
    include $tpl . 'header.php'; 

    if(isset($_SESSION['Username'])){
        // echo 'Welcome' . $_SESSION['Username'];
    }else{
        header('location: index.php');
        exit();
    }

    include $tpl . 'customerHomeNavbar.php';
    
    include $tpl . 'customerProductView.php';

    include $tpl . 'footer.php';
?>