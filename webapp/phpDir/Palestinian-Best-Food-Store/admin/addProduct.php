<?php
    session_start();
    $pageTitle = 'Add Product';
    include 'init.php';
    include $tpl . 'header.php'; 

    if(isset($_SESSION['Username'])){
        if(isset($_POST['addProduct'])) { 
            addProduct($_SESSION['Username']);
        }
    }else{
        header('location: index.php');
        exit();
    }

    include $tpl . 'homeNavbar.php';
    include $tpl . 'addProduct.php';

    include $tpl . 'footer.php';
?>