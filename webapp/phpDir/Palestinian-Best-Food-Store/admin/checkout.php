<?php
    session_start();
    $pageTitle = 'Checkout Page';
    // print_r($_SESSION['Username']);
    include 'init.php';
    include $tpl . 'header.php'; 

    if(isset($_SESSION['Username'])){

        if(isset($_POST['buyTheOrder']))
            buy($_SESSION, $_POST["address"]);
    }else{
        header('location: index.php');
        exit();
    }

?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="customerHome.php">Home</a></li>
            <li class="breadcrumb-item"><a href="order.php">Order</a></li>
            <li class="breadcrumb-item active">Checkout</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<form method="POST" enctype="multipart/form-data">
   <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>Billing Address</h2>
                            <div class="row">

                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" placeholder="Address" name="address">
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <h1>Cart Total</h1>
                            <p class="sub-total">Total Price: <span><?php echo $_SESSION['totalPrice']; ?></span></p>
                            <p class="ship-cost">Total quantity<span><?php echo $_SESSION['totalQuantity']; ?></span></p>
                            <h2>Grand Total<span><?php echo $_SESSION['grandTotal']; ?></span></h2>
                        </div>

                        <div class="checkout-payment">
                            <div class="checkout-btn">
                                <a><button class="btn" name="buyTheOrder">Buy</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

</form>
<?php
    include $tpl . 'footer.php';
?>