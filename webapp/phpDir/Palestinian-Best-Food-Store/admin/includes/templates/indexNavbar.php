    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"><i class="fa fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link" href="index.php"><i class="fa fa-sign-in-alt"></i>Login</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i>Customer</a>
                                <div class="dropdown-menu">
                                    <a href="register.php" class="dropdown-item"><i class="fa fa-registered"></i>Register</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php"><i class="fa fa-user"></i>About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php"><i class="fa fa-phone"></i>Contuct Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-md-9">
                    <form class="login" action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="container-fluid">
                            <h4>Login Page</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="login-form">
                                            <div class="col-md-6">
                                                <label>E-mail / Username</label>
                                                <input class="form-control" type="text" placeholder="E-mail / Username" name="user">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Password</label>
                                                <input class="form-control" type="text" placeholder="Password" name="pass">
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn">Submit</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->