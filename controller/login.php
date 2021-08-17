<?php
require('../database/db.php');

session_start();
$errors= array();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // email validation
    if (empty($email)) {
        array_push($errors,"Email is required");
         $_SESSION['Error'] = $errors;
        header("Location: ../signin.php");   
     } else if(strlen($email) < 4) {
        array_push($errors,"Username is too short");
        $_SESSION['Error'] = $errors;
        header("Location: ../signin.php");
    } 
    

    // PASSWORD
    if (empty($password)) {
        array_push($errors,"Password is required");
         $_SESSION['Error'] = $errors;
        header("Location: ../signin.php"); 
        die();  
     } else if(strlen($password) < 6) {
        array_push($errors,"Password is too short");
        $_SESSION['Error'] = $errors;
        header("Location: ../signin.php");
        die();  
    } 
    //check user in db
     $user = "SELECT * FROM Users WHERE email='$email'";
     $result = mysqli_query($conn, $user);

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
    $hashed_password =  $row["passwrd"];
    if(password_verify($password, $hashed_password)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];       
   // redirect to dashboard
   header("Location: ../dashboard/home.php");
} else {
     array_push($errors,"Username or password is invalid!!");
     $_SESSION['Error'] = $errors;
     header("Location: ../signin.php");
     die(); 
   }
}
} else {
    array_push($errors,"Username or password is invalid");
        $_SESSION['Error'] = $errors;
        header("Location: ../signin.php");
        die(); 
     } 

} else {
 header("Location: ../index.php");
 die();
}

?>