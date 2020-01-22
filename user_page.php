<?php 

    session_start();

    if (!$_SESSION['userid']) {
            header("Location: index.php");
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>you are member</h1>
    <h3>hi , <?php echo $_SESSION['user']; ?></h3>
    <a href="logout.php">Logout</a>
</body>
</html>
    <?php } ?>