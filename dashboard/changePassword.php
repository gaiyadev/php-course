
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
    <link rel="stylesheet" href="../css/master.css">
</head>
<body>
  <div class="container">
        <h3>Change password</h3>
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
   <form action="../controller/changePassword.php" method="post">
            <label for="cPassword">current Password</label> <br>
            <input type="password" name="cPassword">
            <br>
            <br>
            <label for="nPassword">new Password</label>
            <br>
            <input type="password" name="nPassword">
            <br>
            <br>
            
            <label for="rPassword">etypw Password</label>
            <br>
            <input type="password" name="rPassword">
            <br>
            <br>
            <input type="submit" name="submit">
        </form>
  </div>
</body>
</html>