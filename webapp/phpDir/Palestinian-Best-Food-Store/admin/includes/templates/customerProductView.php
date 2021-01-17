<?php
    if(isset($_SESSION['Username'])){
        $result = viewProducts();

        // if(isset($_POST['authenticated'])){
        //     searchForProduct('','Authenticated','');
        // }

        // if(isset($_POST['packaged'])){
        //     searchForProduct('','','packaged');
        // }

    }else{
        header('location: index.php');
        exit();
    }
?>

    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">


                <div class="col-lg-10">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="product-search" class="action" method="post" >
                                            <input name="search">
                                            <button name="searchForProduct"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                    <?php
                        if(isset($_POST['searchForProduct'])){
                            $likeQuery = searchForProduct($_POST['search']);

                            if($likeQuery->rowCount() == 0){
                    ?>
                            <h4 style="background-color: #eca0a0;"> Product Not Found, Try another Words </h4>
                    <?php }else{
                            foreach($likeQuery as $row):
                            ?>

                                <div class="col-md-4">
                                    <div class="product-item">
                                        <div class="header-slider normal-slider">
                                            <div class="header-slider-item">
                                                <a href="<?php echo  'customerProductDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage1']; ?>" alt="Slider Image"  width="600" height="600"/></a>
                                            </div>
                                            <div class="header-slider-item">
                                                <a href="<?php echo  'customerProductDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage2']; ?>" alt="Slider Image"  width="600" height="600"/></a>
                                            </div>
                                            <div class="header-slider-item">
                                                <a href="<?php echo  'customerProductDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage3']; ?>" alt="Slider Image"  width="600" height="600"/></a>
                                            </div>
                                        </div>
                                        <div class="product-price">   
                                            <h3 name="product_price"><span>$</span><?php echo $row['productPrice']; ?></h3>
                                            <h3 style="float:right" name="product_name"><?php echo $row['productName']; ?></h3>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            endforeach;
                        }

                        }else{
                            foreach($result as $row):
                    ?>
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="header-slider normal-slider">
                                        <div class="header-slider-item">
                                            <a href="<?php echo  'customerProductDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage1']; ?>" alt="Slider Image"  width="400" height="400"/></a>
                                        </div>
                                        <div class="header-slider-item">
                                            <a href="<?php echo  'customerProductDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage2']; ?>" alt="Slider Image"  width="400" height="400"/></a>
                                        </div>
                                        <div class="header-slider-item">
                                            <a href="<?php echo  'customerProductDetails.php' . '?id=' . $row['productId']; ?>"><img src="<?php echo $img . $row['productImage3']; ?>" alt="Slider Image"  width="400" height="400"/></a>
                                        </div>
                                    </div>
                                    <div class="product-price">   
                                        <h3 name="product_price"><span>$</span><?php echo $row['productPrice']; ?></h3>
                                        <h3 style="float:right" name="product_name"><?php echo $row['productName']; ?></h3>
                                        <!-- <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a> -->
                                    </div>
                                </div>
                            </div>
                    <?php
                        endforeach;
                        }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <!-- Product List End -->