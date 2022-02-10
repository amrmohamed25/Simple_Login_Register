<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="center">
   
            <h1>Home Page</h1>
            <a href="login.php" class="btn">Login</a>
            <div style="height: 10px;"></div>
            <a href="register.php" class="btn">Register</a>

    </div>
    <?php
    session_start();
    
    if (isset($_SESSION['name'])) {
        header('location: welcome.php');
    }?>
</body>

</html>