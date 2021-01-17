<?php
    session_start();
    $pageTitle = 'Home';
    // print_r($_SESSION['Username']);
    include 'init.php';
    include $tpl . 'header.php'; 

    $stmt = $con->prepare("SELECT userStatus From user WHERE userName = ?");
    $stmt->execute(array($_SESSION['Username']));
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $result = $result[0];

    if(isset($_SESSION['Username'])){
        // echo 'Welcome' . $_SESSION['Username']; 
        if($result['userStatus'] == 0){
            header('location: customerHome.php');
            exit();
        }else if($result['userStatus'] == 1){

        }
    }else{
        header('location: index.php');
        exit();
    }

    include $tpl . 'homeNavbar.php';
    include $tpl . 'productView.php';

    include $tpl . 'footer.php';
?>