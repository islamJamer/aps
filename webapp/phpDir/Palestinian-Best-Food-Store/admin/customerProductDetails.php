<?php
    session_start();
    $pageTitle = 'Product Detalis';
    include 'init.php';
    include $tpl . 'header.php'; 

    if(isset($_SESSION['Username'])){
        $result = productDetails();

        if(isset($_POST['addToOrder'])) { 
            if($_POST['orderQuantity']<1){
                addOrder($_SESSION['Username'], $_GET['id'], 1);
            }else{
                addOrder($_SESSION['Username'], $_GET['id'], $_POST['orderQuantity']);
            }
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
            <li class="breadcrumb-item active">Product Details</li>
        </ul>
    </div>
</div>

<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single ">
                                <img src="<?php echo $img . $result['productImage1']; ?>"  alt="Product Image"/>
                                <img src="<?php echo $img . $result['productImage2']; ?>"  alt="Product Image"/>
                                <img src="<?php echo $img . $result['productImage3']; ?>"  alt="Product Image"/>
                            </div>
                            <div class="product-slider-single-nav">
                                <img src="<?php echo $img . $result['productImage1']; ?>"  alt="Product Image"/>
                                <img src="<?php echo $img . $result['productImage2']; ?>"  alt="Product Image"/>
                                <img src="<?php echo $img . $result['productImage3']; ?>"  alt="Product Image"/>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <form class="action" method="post" >
                                <div class="product-content">
                                    <div class="title">
                                        <h2><?php echo $result['productName']; ?></h2>
                                    </div>
                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p><?php echo $result['productPrice']; ?></p>
                                    </div>
                                    <div class="price">
                                        <h4>Size:</h4>
                                        <p><?php echo $result['productSize']; ?></p>
                                    </div>
                                    <div class="price">
                                        <h4>Type:</h4>
                                        <p><?php echo $result['productType']; ?></p>
                                    </div>
                                    <div class="Quantity">
                                        <h4>Quantity:</h4>
                                        <input type="text" value="1" name="orderQuantity">
                                    </div>
                                    <a href=""><button class="btn" name="addToOrder">Add to Order List</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div id="description" class="container tab-pane active">
                                <h4>Product description</h4>
                                <p><?php echo $result['productDescription']; ?></p>
                            </div>


                            <div id="reviews" class="container tab-pane fade">
                                <div class="reviews-submit">
                                    <h4>Give your Handle:</h4>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row form">
                                        
                                            <div class="col-sm-6">
                                                <label>Name</label>
                                                <input name="productName" class="form-control" type="text" value="<?php echo $result['productName']; ?>">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Price</label>
                                                <input name="price" class="form-control" type="text" value="<?php echo $result['productPrice']; ?>">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Discription</label>
                                            </div>

                                            <div class="col-sm-12">
                                                <textarea placeholder="Review" name="txtreview"><?php echo $result['productDescription']; ?></textarea>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-md-20 control-label" for="product_categorie">Type</label>
                                                    <div class="col-md-20">
                                                        <select id="product_categorie" name="product_type" class="form-control">
                                                        <option value="<?php echo $result['productType']; ?>" selected><?php echo $result['productType']; ?></option>
                                                            <option value="authenticated">Authenticated Palestinian Food</option>
                                                            <option value="packaged">Pre-packaged Palestinian meals</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-md-20 control-label" for="product_categorie">Size</label>
                                                    <div class="col-md-20">
                                                        <select id="product_categorie" name="product_size" class="form-control">
                                                            <option value="<?php echo $result['productSize']; ?>" selected><?php echo $result['productSize']; ?></option>
                                                            <option value="kg">kg</option>
                                                            <option value="liter">liter</option>
                                                            <option value="pices">pices</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="filebutton">main_image1</label>
                                                    <div class="col-md-4">
                                                        <input type="file" id="image" name="image" accept="image/png, .jpeg, .jpg, image/gif"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="filebutton">main_image2</label>
                                                    <div class="col-md-4">
                                                        <input type="file" id="image2" name="image2" accept="image/png, .jpeg, .jpg, image/gif"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="filebutton">main_image3</label>
                                                    <div class="col-md-4">
                                                        <input type="file" id="image3" name="image3" accept="image/png, .jpeg, .jpg, image/gif"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <a href=""><button class="btn" name="handleProduct">Update</button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include $tpl . 'footer.php';
?>