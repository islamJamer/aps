
<?php

        function login(){
                global $con;

                $username = $_POST['user'];
                $password = $_POST['pass'];
                
                $stmt = $con->prepare("SELECT userName, userPass,userStatus From user WHERE userName = ? AND userPass= ?");
                $stmt->execute(array($username, $password));

                $count = $stmt->rowCount();
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                if(!$username || !$password){
                        echo '  <script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: Incorrect Username or Password!");
                                        location.replace("index.php");
                                </script>';
                }else{
                        if($count>0){
                                $result = $result[0];
                                $_SESSION['Username'] = $username;
                                if($result['userStatus']==1){
                                        header('location: home.php');
                                }elseif($result['userStatus']==0){
                                        header('location: customerHome.php');
                                }
                                exit();
                        }else{
                                echo '  <script LANGUAGE="JavaScript">
                                                window.alert("[ERROR]: Incorrect Password!");
                                                location.replace("index.php");
                                        </script>';
                        }
                }
        }

        function getTitle(){
                global $pageTitle;

                if(isset($pageTitle)){
                        echo $pageTitle;
                }else{
                        echo '';
                }
        }

        function viewProducts(){
                global $con;
                $stmt = $con->prepare("SELECT * FROM products");
                $stmt->execute(array());
               return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        function addProduct($empName){
                global $con;

                $productName = $_POST["productName"];
                $type = $_POST["type"];
                $price = $_POST["price"];
                $size = $_POST["size"];
                $description = $_POST["txtreview"];

                $image1_name = $_FILES['image']['name'];
                $image2_name = $_FILES['image2']['name'];
                $image3_name = $_FILES['image3']['name'];

                if(!$productName || !$price || !$description || !$size || !$type || !$image1_name || !$image2_name || !$image3_name){
                        // echo $productName;
                        // echo $price;
                        // echo $description;
                        // echo $image1_name;
                        // echo $image2_name;
                        // echo $image3_name;
                        echo '<script LANGUAGE="JavaScript">
                        window.alert("[ERROR]: could not add this product!");
                        location.replace("addProduct.php");
                        </script>';
                }else{
                        $image1_tmpname = $_FILES['image']['tmp_name'];
                        $image2_tmpname = $_FILES['image2']['tmp_name'];
                        $image3_tmpname = $_FILES['image3']['tmp_name'];
                        $img = 'layout/img/';
        
                        move_uploaded_file($image1_tmpname, $img . $image1_name);
                        move_uploaded_file($image2_tmpname, $img . $image2_name);
                        move_uploaded_file($image3_tmpname, $img . $image3_name);
        
                        $stmt = $con->prepare("SELECT * FROM products ORDER BY productId DESC LIMIT 1");
                        $stmt->execute();
                        $result = $stmt->fetch();
        
                        $id = $result['productId'] + 1;
        
                        $sql = "INSERT INTO products (productName, productId, productType, productPrice, productSize, productDescription, productImage1, productImage2, productImage3, userName) 
                        VALUES ('$productName','$id', '$type', '$price', '$size', '$description', '$image1_name', '$image2_name', '$image3_name', '$empName')";
        
                        if ($con->query($sql) == TRUE) {
                                echo '<script LANGUAGE="JavaScript">
                                        window.alert("New product added successfully");
                                        location.replace("home.php");
                                        </script>';
                                exit();
        
                        } else {
                                echo '<script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: could not add this product!");
                                        location.replace("addProduct.php");
                                        </script>';
                                exit();
                        }
                        exit();
                }

        }

        function productDetails(){
                global $con;

                $id = $_GET['id'];
                $stmt = $con->prepare("SELECT * FROM products WHERE productId=:id");
                $stmt->execute(['id' => $id]);
                return $stmt->fetch();
        }

        function deleteProduct(){
                global $con;

                $id = $_GET['id'];
                $stmt = $con->prepare("DELETE  FROM products WHERE  productId=:id");
                $stmt->execute(['id' => $id]);

                echo '<script LANGUAGE="JavaScript">
                                window.alert("Deleted successfully");
                                location.replace("home.php");
                        </script>';
                exit();
        }

        function updateProduct(){
                global $con;

                $id = $_GET['id'];
                $productName = $_POST["productName"];
                $type = $_POST["product_type"];
                $price = $_POST["price"];
                $size = $_POST["product_size"];
                $description = $_POST["txtreview"];

                $image1_name = $_FILES['image']['name'];
                $image2_name = $_FILES['image2']['name'];
                $image3_name = $_FILES['image3']['name'];

                if(!$image1_name || !$image2_name || !$image3_name){
                        $stmt = $con->prepare("SELECT productImage1, productImage2, productImage3 From products WHERE productId ='$id'");
                        $stmt->execute(array());
                        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        $result = $result[0];
                        if(!$image1_name)
                                $image1_name= $result['productImage1'];
                        if(!$image2_name)
                                $image2_name= $result['productImage2'];
                        if(!$image3_name)
                                $image3_name= $result['productImage3'];
                }

                if(!$productName || !$price || !$description || !$size || !$type){
                        echo '<script LANGUAGE="JavaScript">
                        window.alert("[ERROR]: could not update this product!");
                        location.replace("productDetails.php?id='. $id .'");
                        </script>';
                }else{
                        $image1_tmpname = $_FILES['image']['tmp_name'];
                        $image2_tmpname = $_FILES['image2']['tmp_name'];
                        $image3_tmpname = $_FILES['image3']['tmp_name'];
                        $img = 'layout/img/';
        
                        move_uploaded_file($image1_tmpname, $img . $image1_name);
                        move_uploaded_file($image2_tmpname, $img . $image2_name);
                        move_uploaded_file($image3_tmpname, $img . $image3_name);
                        
                        $sql = "UPDATE products SET productName = '$productName', productPrice='$price' , productType = '$type', 
                                productPrice = '$price', productDescription = '$description',productImage1='$image1_name', 
                                productImage2='$image2_name', productImage3='$image3_name'  WHERE productId ='$id'";

                        if ($con->query($sql) == TRUE) {
                                echo '<script LANGUAGE="JavaScript">
                                        window.alert("Updated successfully");
                                        location.replace("home.php");
                                        </script>';
                                exit();
        
                        } else {
                                echo '<script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: could not update this product!");
                                        location.replace("productDetails.php?id='. $id .'");
                                        </script>';
                                exit();
                        }
                        exit();
                }
        }
        
        function registerCustomer(){
                global $con;

                $name = $_POST["name"];
                $address = $_POST["address"];
                $bDate = $_POST["bDate"];
                $phone = $_POST["phone"];
                $cridet = $_POST["cridet"];
                $fax = $_POST["fax"];
                $email = $_POST["email"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $retypePasswprd = $_POST["retypePasswprd"];

                if(!$name || !$address || !$bDate || !$phone || !$cridet || !$fax || !$email || !$username || !$password || !$retypePasswprd){
                        echo '  <script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: could not add this customer!");
                                        location.replace("register.php");
                                </script>';
                }else{
                        if($password == $retypePasswprd){
                                $stmt = $con->prepare("SELECT userName From user WHERE userName = ?");
                                $stmt->execute(array($username));
                                $count = $stmt->rowCount();

                                if($count == 0){
                                        $stmt = $con->prepare("SELECT email From user WHERE email = ?");
                                        $stmt->execute(array($email));
                                        $count1 = $stmt->rowCount();
                                        if($count1 == 0){
                                                $user_sql = "INSERT INTO user (userName, userPass, userStatus, Email, ownName, userAddress, userBdate, userPhone, userCridet, userFax) 
                                                VALUES ('$username', $password, '0', '$email', '$name', '$address', '$bDate', '$phone', '$cridet','$fax')";
                                
                                                if ($con->query($user_sql) == TRUE) {
                                                        echo '<script LANGUAGE="JavaScript">
                                                                window.alert("New customer added successfully");
                                                                location.replace("index.php");
                                                                </script>';
                                                        exit();
                                
                                                }
                                                
                                        }else{
                                                echo '  <script LANGUAGE="JavaScript">
                                                                window.alert("[ERROR]: This email already exists!");
                                                                location.replace("register.php");
                                                        </script>';
                                                exit();
                                        }
                                }else{
                                        echo '  <script LANGUAGE="JavaScript">
                                                        window.alert("[ERROR]: This username already exists!");
                                                        location.replace("register.php");
                                                </script>';
                                        exit();
                                }
                                exit(); 
                        }else{
                                echo '  <script LANGUAGE="JavaScript">
                                                window.alert("[ERROR]: Passwords does not match!");
                                                location.replace("register.php");
                                        </script>';
                                exit();
                        }
                }
        }

        function getUserInfo($userName){
                global $con;

                $stmt = $con->prepare("SELECT * FROM user WHERE userName=:username");
                $stmt->execute(['username' => $userName]);
                return $stmt->fetch();
        }

        function updateAccount($user_name){
                global $con;

                $name = $_POST["name"];
                $address = $_POST["address"];
                $bDate = $_POST["bDate"];
                $phone = $_POST["phone"];
                $cridet = $_POST["cridet"];
                $fax = $_POST["fax"];
                $email = $_POST["email"];
                $username = $_POST["username"];

                if(!$name || !$address || !$bDate || !$phone || !$cridet || !$fax || !$email || !$username ){
                        echo '  <script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: Could not update this account!, Please fill all information");
                                        location.replace("myAccount.php");
                                </script>';
                }else{

                        $sql = "UPDATE user SET userName = '$username', Email = '$email', 
                                ownName = '$name', userAddress = '$address',userBdate='$bDate', 
                                userPhone='$phone', userCridet='$cridet', userFax='$fax'  WHERE userName ='$user_name'";

                        if ($con->query($sql) == TRUE) {
                                echo '<script LANGUAGE="JavaScript">
                                        window.alert("Updated successfully");
                                        location.replace("myAccount.php");
                                        </script>';
                                exit();
        
                        } else {
                                echo '<script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: could not update this product!");
                                        location.replace("myAccount.php");
                                        </script>';
                                exit();
                        }
                        exit();
                }
        }

        function updatePassword($user_name){
                global $con;

                $currentPassword = $_POST["currentPassword"];
                $newPassword = $_POST["newPassword"];
                $confirmPassword = $_POST["confirmPassword"];

                $stmt = $con->prepare("SELECT userPass From user WHERE userName = ?");
                $stmt->execute(array($user_name));

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $result = $result[0];
 
                if(!$currentPassword || !$newPassword || !$confirmPassword){
                        echo '  <script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: Could not update this password!, Please fill all inputs!");
                                        location.replace("myAccount.php");
                                </script>';
                }else{
                        if($currentPassword == $result['userPass']){

                                if($newPassword == $confirmPassword){
                                        $sql = "UPDATE user SET userPass = '$newPassword' WHERE userName ='$user_name'";
                                        if ($con->query($sql) == TRUE) {
                                                echo '<script LANGUAGE="JavaScript">
                                                        window.alert("Updated successfully");
                                                        location.replace("logout.php");
                                                        </script>';
                                                exit();
                                        }
                                }else{
                                        echo '  <script LANGUAGE="JavaScript">
                                                        window.alert("[ERROR]: You enterd invaled passwords!");
                                                        location.replace("myAccount.php");
                                                </script>';
                                }


                        }else{
                                echo '  <script LANGUAGE="JavaScript">
                                                window.alert("[ERROR]: incorrect password!");
                                                location.replace("myAccount.php");
                                        </script>';
                        }
                }



        }

        function addOrder($userName, $productId, $quantity){
                global $con;

                $stmt = $con->prepare("SELECT * FROM `order` ORDER BY `order`.`id` DESC");
                $stmt->execute();
                $result = $stmt->fetch();
                // print_r($result);

                $orderId = $result['id'] + 1;

                $sql= "INSERT INTO `order` (`id`, `productId`, `custUserName`, `quantity`) VALUES ('$orderId', '$productId', '$userName', '$quantity')";

                if ($con->query($sql) == TRUE) {
                        echo '<script LANGUAGE="JavaScript">
                                window.alert("Order added successfully");
                                location.replace("customerHome.php");
                                </script>';
                        exit();

                } else {
                        echo '<script LANGUAGE="JavaScript">
                                window.alert("[ERROR]: could not add this order!");
                                location.replace("customerHome.php");
                                </script>';
                        exit();
                }

                echo '  <script LANGUAGE="JavaScript">
                                window.alert("[ERROR]: Could not update this password!, Please fill all inputs!");
                        </script>';   

        }

        function cartList($userName){
                global $con;

                $stmt = $con->prepare (" SELECT `id`,`order`.`custUserName`,`productName`, `productPrice`,`quantity` 
                                        FROM `order`JOIN `products` 
                                        ON `order`.`productId` = `products`.`productId` 
                                        WHERE `order`.`custUserName`=:username
                                     ");

                $stmt->execute(['username' => $userName]);
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        function buy($mySission, $address){
                global $con;

                $flag = 0;
                $username = $mySission['Username'];
                $grandTotal = $mySission['grandTotal'];
                $orders = $mySission['cartList'];

                if($address){
                        foreach($mySission['cartList'] as $row):
                                $id = $row['id'];
                                $sql= "INSERT INTO `cart` (`cartAddress`, `orderId`, `custName`, `grandTotal`) VALUES ('$address', '$id', '$username', '$grandTotal');";
                                if($con->query($sql) != FALSE){
                                   $flag++;     
                                }
                        endforeach;
                }else{
                        echo '<script LANGUAGE="JavaScript">
                                window.alert("[ERROR]: Please fill the address");
                                location.replace("checkout.php");
                                </script>';
                }
                if($flag < 1){
                        echo '<script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: Could not add this cart!");
                                        location.replace("customerHome.php");
                                </script>';

                        exit();
                }else{
                        echo '<script LANGUAGE="JavaScript">
                                        window.alert("[ERROR]: Added succsessfuly");
                                        location.replace("customerHome.php");
                                </script>';

                        exit();
                }
        }

        function searchForProduct($search){
                global $con;

                $user_query=$con->prepare(" SELECT * FROM products WHERE
                                            productName LIKE '%$search%' OR
                                            productDescription LIKE '%$search%'
                                        ");
                $user_query->setFetchMode(PDO:: FETCH_ASSOC);
                $user_query->execute();
                return $user_query;

        }
?>