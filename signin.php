
<?php     
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP crash course</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
  <div class="container">
        <h3>Sign up</h3>
    <?php 
    if( isset($_SESSION['Error']) ){
    $errors=  $_SESSION['Error'];

        echo "<ul id='list'>";
    foreach ($errors as $error) {
        echo "<li id='error'> $error </li>";
    }
    echo "</ul>";
        unset($_SESSION['Error']);
}
    ?>
   <form action="controller/login.php" method="post">
            <label for="email">Email</label> <br>
            <input type="email" name="email">
            <br>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password">
            <br>
            <br>
            <input type="submit" name="submit">
        </form>
  </div>
</body>
</html>