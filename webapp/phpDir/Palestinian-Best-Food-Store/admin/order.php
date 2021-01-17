<?php
    session_start();
    $pageTitle = 'Cart Page';
    // print_r($_SESSION['Username']);
    include 'init.php';
    include $tpl . 'header.php'; 

    if(isset($_SESSION['Username'])){
        $cart_list = cartList($_SESSION['Username']);
        $total_price = 0;
        $total_quantity = 0;
        $bill = 0;
    }else{
        header('location: index.php');
        exit();
    }

?>

    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="customerHome.php">Home</a></li>
                <li class="breadcrumb-item active">Cart List</li>
            </ul>
        </div>
    </div>

   <!-- Order Start -->
    <div class="order-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="order-page-inner">
                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">

                                <?php
                                    foreach($cart_list as $row):
                                        $total_price += $row['productPrice'];
                                        $total_quantity += $row['quantity'];
                                        $bill += ($total_price*$total_quantity);
                                ?>
                                        <tr>
                                            <td><h5 name="name"><?php  echo $row['productName']; ?></h5></td>
                                            <td><h5 name="price"><?php  echo $row['productPrice']; ?></h5></td>          
                                            <td><h5 name="quantity"><?php  echo $row['quantity']; ?></h5></td>          
                                            <td><h5 name="total"><?php  echo $row['productPrice']*$row['quantity']; ?></h5></td>
                                            <td>
                                                <button href="?id=<?php echo $row['id']; ?>" name="deleteOrder"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                <?php
                                    endforeach;
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4">
                    <div class="order-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="order-summary">
                                    <div class="order-content">
                                        <h1>Order Summary</h1>
                                        <p>Total Price: <span><?php  echo $total_price; ?></span></p>
                                        <p>Total Quantity: <span><?php  echo $total_quantity; ?></span></p>
                                        <h2>Grand Total: <span><?php  echo $bill; ?></span></h2>
                                    </div>
                                    <div class="order-btn">
                                        <?php  
                                            $_SESSION['cartList'] = $cart_list;
                                            $_SESSION['totalPrice'] = $total_price;
                                            $_SESSION['totalQuantity'] = $total_quantity;
                                            $_SESSION['grandTotal'] = $bill;
                                        ?>
                                        <a href="checkout.php" style="color: black;"><button>Checkout</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Order End -->

<?php
    include $tpl . 'footer.php';
?>