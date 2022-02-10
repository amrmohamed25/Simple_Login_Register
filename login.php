
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>
    <div class="center">
        <h1 style="font-size:40px;">Login</h1>
        <form method="post" name="myForm" action="" onsubmit="return validateLoginForm()">

            <p>
                <label for="Email">Email:</label>
                <input type="email" name="Email" id="Email">
            </p>
            <p>
                <label for="Password">Password:</label>
                <input type="password" name="Password" id="Password" minlength="8">
                <i class="bi bi-eye-slash" id="togglePassword" style="color:black"></i>
            </p>
            <div style="text-align: center;">
                <input type="submit" name="submit" class="btn" value="Login" />
            </div>
        </form>
        <h3 style="font-size:14px;">Don't have an account?  <a href="register.php">Register now</a></h3>
    </div>
    <script src="loginValidate.js"></script>
    <?php
session_start();
if (isset($_SESSION['name'])) {
    header('location: welcome.php');
}

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

if (!$db) {
    die("Connection failed");
} else {

    if (isset($_POST['submit'])) {
        // receive all input values from the form

        $email = $_POST['Email'];
        $password = $_POST['Password'];

        $result = mysqli_query($db, "SELECT * FROM user WHERE email='$email'");
        $user = mysqli_fetch_assoc($result);
        if ((md5($password)== $user['password']|| $password==$user['password'])&& $user) {
            // if ((password_verify($password, $user['password'])|| $password==$user['password'])&& $user) {
            $_SESSION['name'] = $user['name'];
            header('location: welcome.php');
        } else {
            echo '<script language="javascript">';
            echo 'alert("Check email or password");';
            echo 'window.location = "login.php"';
            echo '</script>';
        }
    }
    mysqli_close($db);
}?>
</body>

</html>


