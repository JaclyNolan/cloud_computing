<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="register.css" type="text/css" rel="stylesheet">
    <title></title>
</head>

<body>
    <div class="homebtn">
        <a href="homepage.php">
            <h3> &lt; Home</h3>
        </a>
    </div>
    <div class="register">
        <div class="title">
            <div>REGISTER</div>
        </div>
        <form action="" method="post">
            <div class="boxes">
                <div class="info">
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <input type="password" placeholder="Confirm Password" name="confirm_password">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="gender">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
                <!-- <div class="uni">
                    <select id="university" name="university">
                        <option value="noUni">-Select an university-</option>
                        <option value="BTEC British International College">BTEC British International College</option>
                        <option value="FPT University">FPT University</option>
                        <option value="FPT Polytechnic College">FPT Polytechnic College</option>
                    </select>
                </div>
                <div class="course">
                    Course: <br>
                    <input type="checkbox" id="HTML/CSS" name="HTML/CSS" value="HTML/CSS">
                    <label for="HTML/CSS">HTML/CSS</label>
                    <input type="checkbox" id="PHP" name="PHP" value="PHP">
                    <label for="PHP">PHP</label> <br>
                    <input type="checkbox" id="JavaScript" name="JavaScript" value="JavaScript">
                    <label for="JavaScript">JavaScript</label>
                    <input type="checkbox" id="MySQL" name="MySQL" value="MySQL">
                    <label for="MySQL">MySQL</label>
                </div> -->
            </div>
            <div class="submit_part">
                <input type="submit" name="register" value="Register">
            </div>
            <div class="have_account">
                <p>Already member? <a href="login.php">Sign in now!</a></p>
            </div>
        </form>
    </div>
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'online_shopping_website');
    // if ($connect) {
    //     echo "Successful connection";
    // } else {
    //     echo "Unsuccessful connection";
    // }
    ?>
    <?php
    if (isset($_POST['register']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['confirm_password']) && isset($_POST['username'])) {
        $isInvalid = false;
        $invalid_chars = '(){}[]|`¬¦! "£$%^&*"<>:;#~_-+=,';
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $gender = $_POST['gender'];
        // if ($_POST['username'] != '') {$username = $_POST['username'];} else {echo "Please insert username";}
        // if ($_POST['email'] != '') {$email = $_POST['email'];} else {echo "Please insert email";}
        // if ($_POST['password'] != '') {$password = $_POST['password'];} else {echo "Please insert password";}
        // if ($_POST['confirm_password'] != '') {$confirm_password = $_POST['confirm_password'];} else {echo "Please insert confirm password";}
        // if ($_POST['gender'] != '') {$gender = $_POST['gender'];} else {echo "Please insert gender";}
        // $confirm_password = $_POST['university'];
        // $university = $_POST['confirm_password'];
        // $confirm_password = $_POST['confirm_password'];
        // $confirm_password = $_POST['confirm_password'];
        if (!$isInvalid) {
            for ($i = 0; $i < strlen($invalid_chars); $i++) {
                if (strpos($email, $invalid_chars[$i]) != false) {
                    echo "Invalid Email";
                    $isInvalid = true;
                    break;
                }
                if (strpos($password, $invalid_chars[$i]) != false) {
                    echo "Invalid Password";
                    $isInvalid = true;
                    break;
                }
            }
        }
        if (!$isInvalid) {
            if (strlen($username) < 4 || strlen($username) > 32) {
                echo "Username must be in 4-32 characters long";
                $isInvalid = true;
            }
            if (strlen($password) < 4 || strlen($password) > 32) {
                echo "Password must be in 4-16 characters long";
                $isInvalid = true;
            }
        }
        if (!$isInvalid) {
            $sql = "SELECT * FROM user WHERE email = '$email' or username = '$username'";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "This email has already been registered";
            } else {
                if ($password != $confirm_password) {
                    echo "Password doesn't match confirm password";
                } else {
                    $sql = "INSERT INTO user VALUES('$email', '$password', '$username', '$gender')";
                    $result = mysqli_query($connect, $sql);

                    // echo "Register successfully. Moving you to the login page...";
                    // sleep(5);
                    // header("Location: login.php");
                    echo "<script> alert('Sign up successfully')</script>";
                    echo "<script>window.open('login.php','_self')</script>";
                }
            }
        }
    } else {
        echo "Insert all of the valuables";
    }
    ?>
</body>

</html>