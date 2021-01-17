<?php
    ob_start();
    session_start();
    $pageTitle = 'Palestinian Best Food Store';

    if(isset($_SESSION['Username'])){
        echo 'Welcome' . $_SESSION['Username'];
        // header('location: home.php');
    }
    include 'init.php';
    include $tpl . 'header.php'; 
    include $tpl . 'indexNavbar.php'; 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        login();
    }
?>

<?php  
    include $tpl . 'footer.php'; 
    ob_end_flush();
?>
