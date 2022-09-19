<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link type="text/css" rel="stylesheet" href="add_product.css">
</head>
<body>
<div class="wrapper">
        <div class="menu">
                <!-- <div class="dropdown">
                    <button class="dropbtn">Menu</button>
                    <div class="dropdown-content">
                        <a href="#">Link</a>
                        <a href="#">Zelda</a>
                        <a href="#">Ganon</a>
                    </div>
                </div> -->
                <div class="normal_menu">
                    <a href="../homepage.php">Home</a>
                    <a href="../about.php">About</a>
                    <?php 
                        if (!isset($_SESSION['username'])) {
                            echo "<a href='../login.php'>Log in</a>";
                            echo "<a href='../register.php'>Sign up</a>";
                        } else {
                            echo "<a>Welcome! " . $_SESSION['username'] . "</a>";
                            echo "<a href='../logout.php'>Log out</a>";
                        }
                    ?>
                </div>
        </div>
        <div class="header">
            <a href='../homepage.php'><img src="../Img/Shop_icon.webp"></a>
            <div class="shit">
                <div class="title">Zelda Breath of your Mom</div>
                <div id="form_search">
                    <form>
                        <table>
                            <tr>
                                <td><input type="text" name="search" placeholder="Search" class="search_bar"></td>
                                <td><button class="search_button"><img src='../Img/Search_Icon.png'></button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <br><br><br>
            <div class="login_info">

            </div>
        </div>
        <div class="content">
            <div class="about">
                <form method="POST" enctype="multipart/form-data"><br>
                    <input type="text" placeholder="Product ID" name="product_ID"><br>
                    <input type="text" placeholder="Product Name" name="product_name"><br>
                    <input type="text" placeholder="Product Price" name="product_price"><br>
                    <input type="text" placeholder="Product Type" name="product_type"><br>
                    <input type="file" name="product_img"><br>
                    <div> or  <input type="text" name="product_img_url" placeholder="URL"> </div><br>
                    <input type="submit" name="add_product" value="ADD">
                </form>
            </div>
        </div>
        <div class="footer">
    
        <div class="footer">
        </div>
    <?php 
        $connect = mysqli_connect('localhost','root','','online_shopping_website');
        if (isset($_POST['add_product'])) {
            $product_ID = $_POST['product_ID'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_type = $_POST['product_type'];
            if ($_FILES['product_img']['error'] == 4) {
                $product_img = $_POST['product_img_url'];
            } else {
                $product_img = $_FILES['product_img']['name'];
                $product_img_tmp = $_FILES['product_img']['tmp_name'];
                move_uploaded_file($product_img_tmp,"../Img/Product/$product_img");
            }
            $sql = "INSERT INTO product VALUES('$product_ID','$product_name','$product_img','$product_price','$product_type')";
            $result = mysqli_query($connect, $sql);
            if ($result){
                echo "<script> alert('Product added successfully')</script>";
                echo "<script>window.open('../homepage.php','_self')</script>";
            } else {
                echo "<script> alert('ERROR!')</script>";
            }
        }
    ?>
</body>
</html>