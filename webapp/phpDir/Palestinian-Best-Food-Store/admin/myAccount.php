<?php
    session_start();
    $pageTitle = 'My Account Page';
    // print_r($_SESSION['Username']);
    include 'init.php';
    include $tpl . 'header.php'; 

    if(isset($_SESSION['Username'])){
        $userInfo = getUserInfo($_SESSION['Username']);
        // print_r($userInfo);
        if(isset($_POST['updateAccount'])){
            updateAccount($_SESSION['Username']);
        }
        if(isset($_POST['updatePassword'])){
            updatePassword($_SESSION['Username']);
        }

    }else{
        header('location: index.php');
        exit();
    }

?>
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="customerHome.php">Home</a></li>
                <li class="breadcrumb-item active">My Account</li>
            </ul>
        </div>
    </div>
       <!-- My Account Start -->
       <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>

                                <form class="row" class="action" method="post">
                                    <div class="col-md-6">
                                        <label>Your Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $userInfo['ownName']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Birth Date</label>
                                        <input class="form-control" type="text" name="bDate" placeholder="Birth Date" value="<?php echo $userInfo['userBdate']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" name="phone" placeholder="Phone" value="<?php echo $userInfo['userPhone']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Fax</label>
                                        <input class="form-control" type="text" name="fax" placeholder="Fax" value="<?php echo $userInfo['userFax']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $userInfo['Email']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>User Name</label>
                                        <input class="form-control" type="text" name="username" placeholder="User Name" value="<?php echo $userInfo['userName']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="address" placeholder="Address" value="<?php echo $userInfo['userAddress']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Credit Card</label>
                                        <input class="form-control" type="text" name="cridet" placeholder="Credit Card" value="<?php echo $userInfo['userCridet']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <a href=""><button class="btn" name="updateAccount">Apdate Account</button></a>
                                        <br><br>
                                    </div>
                                </form>


                                <h4>Password change</h4>

                                <form class="row" class="action" method="post">
                                    <div class="col-md-12">
                                        <input class="form-control" name="currentPassword" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="newPassword" type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="confirmPassword" type="text" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <a href=""><button class="btn" name="updatePassword">Save Changes</button></a>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->

        <?php
    include $tpl . 'footer.php';
?>