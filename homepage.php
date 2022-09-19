<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zelda BOYM</title>
    <link type="text/css" rel="stylesheet" href="homepage.css">
</head>

<body>
    <?php 
        $connect = mysqli_connect('localhost','btec_user','Btec@123abc','btec_db');
    ?>
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
                    <a href="about.php">About</a>
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
            <div class="left">
                <div class="category">Category</div>
                <a href="homepage.php"><button class="section">All</button></a>
                <a href="homepage.php?category=Weapon"><button class="section">Weapon</button></a>
                <a href="homepage.php?category=Melee"><button class="sub_section">Melee</button></a>
                <a href="homepage.php?category=Bow"><button class="sub_section">Bow</button></a>
                <a href="homepage.php?category=Sheild"><button class="sub_section">Sheild</button></a>
                <a href="homepage.php?category=Armor"><button class="section">Armor</button></a>
                <a href="homepage.php?category=Chest"><button class="sub_section">Chest</button></a>
                <a href="homepage.php?category=Legging"><button class="sub_section">Legging</button></a>
                <a href="homepage.php?category=Whole_body"><button class="sub_section">Whole body</button></a>
                <a href="homepage.php?category=Ingredient"><button class="section">Ingredient</button></a>
                <a href="homepage.php?category=Material"><button class="section">Material</button></a>
                <a href="homepage.php?category=Item"><button class="section">Item</button></a>
            </div>
            <div class="right">
                <?php 
                    if ($connect) {
                        $sql = "SELECT * FROM product";
                        $result = mysqli_query($connect, $sql);
                        $allowCategory = array();
                        if (isset($_GET['category'])) {
                            if ($_GET['category'] == "Weapon") {
                                array_push($allowCategory, 'Melee');
                                array_push($allowCategory, 'Bow');
                                array_push($allowCategory, 'Sheild');
                            } elseif ($_GET['category'] == "Armor") {
                                array_push($allowCategory, 'Chest');
                                array_push($allowCategory, 'Legging');
                                array_push($allowCategory, 'Whole_body');
                            } else {
                                array_push($allowCategory, $_GET['category']);
                            }
                        }
                        while ($product = mysqli_fetch_array($result)) {
                            if (count($allowCategory) == 0) {
                                echo "<a href='detail.php?id=". $product['product_id'] . "'><div class='product'>
                                            <img class='product_img' src='Img/Product/" . $product['product_image'] . "'> <br>
                                            <span class='product_name'> ". $product['product_name'] . "</span>
                                            <table class='rupee_and_price'>
                                            <tr> <td> <img class='rupee' src='Img/Rupee.webp'> </td> 
                                            <td> <span class='product_price'>". $product['product_price'] ."</span> </td> </tr>
                                            </table>
                                        </div></a>";
                            }
                            foreach ($allowCategory as $v) {
                                if ($product['product_type'] == $v) {
                                    echo "<a href='detail.php?id=". $product['product_id'] . "'><div class='product'>
                                            <img class='product_img' src='Img/Product/" . $product['product_image'] . "'> <br>
                                            <span class='product_name'> ". $product['product_name'] . "</span>
                                            <table class='rupee_and_price'>
                                            <tr> <td> <img class='rupee' src='Img/Rupee.webp'> </td> 
                                            <td> <span class='product_price'>". $product['product_price'] ."</span> </td> </tr>
                                            </table>
                                        </div></a>";
                                    break;
                                } 
                            }
                            
                        }
                    }
                ?>
                <!-- <div class="product">
                    <img src="https://media.istockphoto.com/vectors/sword-icon-on-white-background-a-type-of-melee-weapon-with-a-direct-vector-id1219903969?k=20&m=1219903969&s=170667a&w=0&h=GdnNLyY2JmNcGgF5qBxMkYdIlz-tcHepLEckbXmWFj4=">
                    <a href="#" target="_self"><p>Melee Weapons</p></a>
                    <p>20 - 5000 rupees</p>
                </div>
                <div class="product">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWVftebVU_qDROt7fQMBs4lPBvXkTqlVepPQ&usqp=CAU">
                    <a href="#" target="_self"><p>Bows</p></a>
                    <p>300 - 6000 rupees</p> -->
            </div>
        </div>
        <div class="footer">
            <a href="Admin/add_product.php">Add product</a>
        </div>
    </div>
</body>

</html>