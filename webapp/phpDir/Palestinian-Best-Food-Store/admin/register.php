<?php
    session_start();
    $pageTitle = 'Register Page';
    include 'init.php';
    include $tpl . 'header.php'; 

    if(isset($_POST['registerBtn'])){
        registerCustomer();
    }
?>

<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Register Page</li>
        </ul>
    </div>
</div>

<div class="col-md-9">
    <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="register-form" class="action" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Your Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Your Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Your Address</label>
                                    <input class="form-control" name="address" type="text" placeholder="Your Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Berth Date</label>
                                    <input class="form-control" name="bDate" type="text" placeholder="Berth Date">
                                </div>
                                <div class="col-md-6">
                                    <label>Phone No</label>
                                    <input class="form-control" name="phone" type="text" placeholder="Phone No">
                                </div>
                                <div class="col-md-6">
                                    <label>Cridet No</label>
                                    <input class="form-control" name="cridet" type="text" placeholder="Cridet No">
                                </div>
                                <div class="col-md-6">
                                    <label>Tel and fax</label>
                                    <input class="form-control" name="fax" type="text" placeholder="tel and fax">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="email" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Username</label>
                                    <input class="form-control" name="username" type="text" placeholder="Username">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="text" placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <label>Retype Password</label>
                                    <input class="form-control" name="retypePasswprd" type="text" placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <a href=""><button class="btn" name="registerBtn">Regist</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>





<?php
    include $tpl . 'footer.php';
?>