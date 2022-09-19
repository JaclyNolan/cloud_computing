<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $product_id =  $_GET['id'];
        $connect = mysqli_connect('localhost','root','','online_shopping_website');
        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
        $result = mysqli_query($connect, $sql);
        $array = mysqli_fetch_array($result);
        $product_name = $array['product_name'];
        $product_price = $array['product_price'];
        $product_image = $array['product_image'];
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_name ?></title>
    <link type="text/css" rel="stylesheet" href="detail.css">
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
                    <a href="homepage.php">Home</a>
                    <a href="about.html">About</a>
                    <?php 
                        if (!isset($_SESSION['username'])) {
                            echo "<a href='login.php'>Log in</a>";
                            echo "<a href='register.php'>Sign up</a>";
                        } else {
                            echo "<a>Welcome! " . $_SESSION['username'] . "</a>";
                            echo "<a href='logout.php'>Log out</a>";
                        }
                    ?>
                </div>
        </div>
        <div class="header">
            <a href='homepage.php'><img src="Img/Shop_icon.webp"></a>
            <div class="shit">
                <div class="title">Zelda Breath of your Mom</div>
                <div id="form_search">
                    <form>
                        <table>
                            <tr>
                                <td><input type="text" name="search" placeholder="Search" class="search_bar"></td>
                                <td><button class="search_button"><img src='Img/Search_Icon.png'></button></td>
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
            <div class="detail">
                <img src="Img/Product/<?php echo $product_image; ?>" class="product_image">
                <div class="product_info">
                    <div class="product_name"><?php echo $product_name; ?></div>
                    <table class='rupee_and_price'>
                        <tr> <td> <img class='rupee' src='Img/Rupee.webp'> </td> 
                        <td> <span class='product_price'><?php echo $product_price; ?></span> </td> </tr>
                    </table>
                    <form method="POST">
                        <label class="quantity_label">Quantity:</label>
                        <input type="text" class="quantity" name="quantity" value="1">
                    </div>
                        <input type="submit" class="buy" name="buy" value="Buy Now">
                    </form>
                </div>

        </div>
        <div class="footer">

        </div>
    </div>

    <?php
        if (isset($_POST['buy'])) {
            if (isset($_SESSION['username'])) {
                echo "<script> alert('Product was successfully ordered')</script>";
                echo "<script>window.open('homepage.php','_self')</script>";
            } else {
                echo "<script> alert('Please login first')</script>";
                echo "<script>window.open('login.php','_self')</script>";
            }
        }
    ?>
</body>
</html>