<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <?php 
    if(isset($_SESSION['username']) || isset($_SESSION['email']) )
{
    $username=  $_SESSION['username'];
    $email=  $_SESSION['email'];
    echo "Welcome". " ". $username. " " . $email;
    unset($_SESSION['Error']);
}
    ?>
</body>
</html>