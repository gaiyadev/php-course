<?php
session_start();
require('../database/db.php');
$errors = array();
$id = $_SESSION["id"];/* userid of the user */

if(isset($_POST['submit'])){
    $cPassword = $_POST['cPassword'];
    $nPassword = $_POST['nPassword'];
    $rPassword = $_POST['rPassword'];    
//echo $id;
    // PASSWORD
    if (empty($cPassword)) {
        array_push($errors,"curent Password is required");
         $_SESSION['Error'] = $errors;
        header("Location: ../dashboard/changePassword.php"); 
        die();  
     } else if(empty($nPassword))  {
        array_push($errors,"New Password is required");
         $_SESSION['Error'] = $errors;
        header("Location: ../dashboard/changePassword.php"); 
        die();  
    } else if($nPassword !== $rPassword) {
         array_push($errors,"Password mismatch");
         $_SESSION['Error'] = $errors;
        header("Location: ../dashboard/changePassword.php"); 
        die(); 
    }
     //db
    $hashed_password = password_hash($nPassword, PASSWORD_DEFAULT);
    
    $sql = "UPDATE Users SET passwrd='$hashed_password' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
      header("Location: ../signin.php");
        } else {
       array_push($errors,"something went wrong");
         $_SESSION['Error'] = $errors;
        header("Location: ../dashboard/changePassword.php"); 
       }
        mysqli_close($conn);

     } else {
     header("Location: ../dashboard/updateProfile.php"); 
    die();
}

?>