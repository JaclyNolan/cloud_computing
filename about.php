<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="homepage.css">
    <title>About</title>
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
            <div class="about">
                <div class="about_title">
                        About us!
                </div>
                <div class="about_paragraph">
                        We are what left of Hyrule, accompanying our hero Link along the way, preparing with gear for the last fight against 
                        evil of this long forsaken century (and admittedly make some money along the way). Some of us used to serve the Hyrule 
                        kingdom, and some even came from the rumor to be true the Sheikah tribe. We bought, store, and sell some of the best gear you
                        can find in these lands. Weapon? We got plenty and only in the best condition. Armor? Only from the fable and qualified
                         blacksmiths that always fit you. Other shits? We got all of them. SHOP NOW in the best and only shop the remained left
                         after the reckoning.
                </div>
            </div>
        </div>
        <div class="footer">
        </div>
</body>
</html>