

    <?php
    session_start();
    $pageTitle = 'Contact Us';
    // print_r($_SESSION['Username']);
    include 'init.php';
    include $tpl . 'header.php'; 
?>

    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="customerHome.php">Home</a></li>
                <li class="breadcrumb-item active">Contuct Us</li>
            </ul>
        </div>
    </div>
    <!-- Contact Start -->
    <div class="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h2>Ansam</h2>
                        <h3><i class="fa fa-map-marker"></i>Ramallah, Palestine</h3>
                        <h3><i class="fa fa-envelope"></i>ansam.amer@hotmail.com</h3>
                        <h3><i class="fa fa-phone"></i>0598451848</h3>
                        <div class="social">
                            <a href="https://twitter.com/AnsamJo"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/ansam.awadallah.3/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/ansam_jomaa/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php

include $tpl . 'footer.php';

?>