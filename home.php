<?php
    session_start();
    include 'php/db_com.php';

    if(isset($_SESSION['username']) && isset($_SESSION['id']))
    {
        $uid = $_SESSION['id'];
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include 'layouts/aheader.php';
    ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php }else{
    header("Location: index.php");
}
?>