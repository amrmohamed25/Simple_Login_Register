<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <?php if(!isset($_SESSION['name']))
        header('location: index.php');
    ?>
    <div class="center">
            <h1>Hello <?php echo $_SESSION['name'] ?></h1>
            <form action="destroy.php" method="post">
                <input type="submit" class="btn" value="Logout"/>
            </form>
    </div>
    
</body>

</html>