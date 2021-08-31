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
    if(isset($_SESSION['username']) || isset($_SESSION['email']) || isset($_SESSION['id']) )
{
    $username=  $_SESSION['username'];
    $email=  $_SESSION['email'];
    $id=  $_SESSION['id'];
    echo "Welcome". " ". $username. " " . $email. $id. '<br/>';
    unset($_SESSION['Error']);
}
    ?>
    <br>
    <hr>
    <br>
     <h3>Settings</h3>
    <ul>
        <a href="../dashboard/changePassword.php">Change Password</a> <br>
        <a href="../dashboard/updateProfile.php">update Profile</a> <br> <br>
        <form action="">
            <button type='button' >Logout</button>
        </form>
    </ul>
    <div style="float: right; margin-right: 140px; margin-top: -140px">
    <h1>Post</h1>
    <ul>
        <a href="../dashboard/addPost.php">Add post</a> <br>
        <a href="../dashboard/viewPost.php">view post</a> <br> <br>
       
    </ul>
    </div>
</body>
</html>