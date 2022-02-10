
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>
     <div class="center">
        <h1 style="font-size:40px;">Register</h1>
        <form method="post" name="myForm" action="" onsubmit="return validateRegisterForm()">
            <p>
                <label for="Name">Name:</label>
                <input type="text" name="Name" id="Name">
            </p>
            <p>
                <label for="Email">Email:</label>
                <input type="email" name="Email" id="Email">
            </p>
            <p>
                <label for="Password">Password:</label>
                <input type="password" name="Password" id="Password" minlength="8">
                <i class="bi bi-eye-slash" id="togglePassword" style="color:black"></i>
            </p>
            <p>
                <label for="Confirm">Confirm Password:</label>
                <input type="password" name="Confirm" id="Confirm" minlength="8">
                <i class="bi bi-eye-slash" id="toggleConfirm" style="color:black"></i>
            </p>
            <div style="text-align: center;">
                <input type="submit" name="submit" class="btn" value="Register" />
            </div>
        </form>
        <h3 style="font-size:14px;">Already have an account?  <a href="login.php">Login</a></h3>
</div>
    <script src="registerValidate.js"></script>
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
// REGISTER USER
    if (isset($_POST['submit'])) {
        // receive all input values from the form
        $username = $_POST['Name'];
        $email = $_POST['Email'];
        $password_1 = $_POST['Password'];

        $result = mysqli_query($db, "SELECT * FROM user WHERE email='$email'");
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            echo '<script language="javascript">';
            echo 'alert("Email already exists!");';
            echo 'window.location = "register.php"';
            echo '</script>';
        } else {
            // $password = password_hash($password_1, PASSWORD_DEFAULT); //encrypt the password before saving in the database
            $password=md5($password_1);
            $query = "INSERT INTO user (name, email, password) VALUES('$username', '$email', '$password')";
            mysqli_query($db, $query);
            $_SESSION['name'] = $username;
            header('location: welcome.php');
        }
        mysqli_close($db);

    }
}
?>
</body>

</html>