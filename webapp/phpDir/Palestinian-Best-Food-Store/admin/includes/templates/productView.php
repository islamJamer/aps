<?php
    if(isset($_SESSION['Username'])){
        $result = viewProducts();
    }else{
        header('location: index.php');
        exit();
    }
?>

    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i></i>Authenticated Palestinian Food</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i></i>Pre-packaged Palestinian meals</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Side Bar End -->

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-search">
                                            <input type="email" value="Search">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Product short by
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Newest</a>
                                                    <a href="#" class="dropdown-item">Popular</a>
                                                    <a href="#" class="dropdown-item">Most sale</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-price-range">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Product price range
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">$0 to $50</a>
                                                    <a href="#" class="dropdown-item">$51 to $100</a>
                                                    <a href="#" class="dropdown-item">$101 to $150</a>
                                                    <a href="#" class="dropdown-item">$151 to $200</a>
                                                    <a href="#" class="dropdown-item">$201 to $250</a>
                                                    <a href="#" class="dropdown-item">$251 to $300</a>
                                                    <a href="#" class="dropdown-item">$301 to $350</a>
                                                    <a href="#" class="dropdown-item">$351 to $400</a>
                                                    <a href="#" class="dropdown-item">$401 to $450</a>
                                                    <a href="#" class="dropdown-item">$451 to $500</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        foreach($result as $row):
                    ?>
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="header-slider normal-slider">
                                        <div class="header-slider-item">
                                            <a href="<?php echo  'productDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage1']; ?>" alt="Slider Image"  width="400" height="400"/></a>
                                        </div>
                                        <div class="header-slider-item">
                                            <a href="<?php echo  'productDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage2']; ?>" alt="Slider Image"  width="400" height="400"/></a>
                                        </div>
                                        <div class="header-slider-item">
                                            <a href="<?php echo  'productDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage3']; ?>" alt="Slider Image"  width="400" height="400"/></a>
                                        </div>
                                    </div>
                                    <div class="product-price">   
                                        <h3><span>$</span><?php echo $row['productPrice']; ?></h3>
                                        <h3 style="float:right"><?php echo $row['productName']; ?></h3>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endforeach;
                    ?>
                </div>

            </div>
        </div>
    </div>
    <!-- Product List End -->