<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" type="text/css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <?php
        $connect = mysqli_connect('localhost','btec_user','Btec@123abc','btec_db');
        // if ($connect) {
        //     echo "Successful connection";
        // } else {
        //     echo "Unsuccessful connection";
        // }
    ?>
    <div class="homebtn">
        <a href="homepage.php">
            <h3> &lt; Home</h3>
        </a>
    </div>
    <div class="login">
        <div class="title">
            <div>LOGIN</div>
        </div>
        <form action="" method="post">
            <div class="boxes">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <br>
                <input type="checkbox" id="remember_me">
                <label for="remember_me">Remember me</label>
            </div>
            <div class="submit_part">
                <input type="submit" name="login" value="Login">
            </div>
            <div class="no_account">
                <p>Not a member? <a href="register.php">Sign up now!</a></p>
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($connect, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows == 0) {
                echo "Login unsuccessful";
            } else {
                $username = "SELECT user FROM user WHERE email = '$email' AND password = '$password'";
                $result = mysqli_fetch_array(mysqli_query($connect, $sql));
                $username = $result['username'];
                $_SESSION['username'] = $username;
                echo "<script> alert('Login in successfully!')</script>";
                echo "<script>window.open('homepage.php','_self')</script>";
            }
        } else {
        }
    ?>
</body>

</html>