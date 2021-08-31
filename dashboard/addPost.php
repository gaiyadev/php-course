
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
    <h3>Sign up</h3>
    <?php 
    if( isset($_SESSION['Error']) ) {
    $errors=  $_SESSION['Error'];

        echo "<ul id='list'>";
    foreach ($errors as $error) {
        echo "<li id='error'> $error </li>";
    }
    echo "</ul>";
        unset($_SESSION['Error']);
}else if( isset($_SESSION['Success']) ){
    $success=  $_SESSION['Success'];
        echo  $success;
        unset($_SESSION['Success']);
}
    ?>
    <br>
   <form action="../controller/addPost.php" method="post" onSubmit="submit();">
        <label for="username">Title</label> <br>
            <input type="text" name="title" id="title"  >
            <br>
            <br>
            <label for="body">Body</label> <br>
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
            <br>
            <br>
            <br>
            <input type="submit" name="submit" value="Add Post">
        </form>
  </div>

  <a href="../dashboard/home.php">Go Back</a>
</body>
</html>