<?php
require('../database/db.php');
session_start();
$errors= array();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];

    if (empty($username)) {
        array_push($errors,"Username is required");
        $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");
    }
    else if(strlen($username) < 4) {
        array_push($errors,"Username is too short");
        $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");
    } 

    // email validation
    if (empty($email)) {
        array_push($errors,"Email is required");
         $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");   
     } else if(strlen($email) < 4) {
        array_push($errors,"Email is too short");
        $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       array_push($errors,"Invalid email format");
      $_SESSION['Error'] = $errors;
    }
    

    // PASSWORD
    if (empty($password)) {
        array_push($errors,"Password is required");
         $_SESSION['Error'] = $errors;
        header("Location: ../signup.php"); 
        die();  
     } else if(strlen($password) < 6) {
        array_push($errors,"Password is too short");
        $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");
        die();  
    }  else if ($password !== $Cpassword) {
         array_push($errors,"Password mismatch");
        $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");
        die();  
    }

    // check if email exist
     $user = "SELECT email FROM Users WHERE email='$email'";
     $result = mysqli_query($conn, $user);

if (mysqli_num_rows($result) > 0) {
      array_push($errors,"User already exist");
        $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");
        die();  
} 
  
// hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//    store in database
        $sql = "INSERT INTO Users (username, email, passwrd)
        VALUES ('$username', '$email', '$hashed_password')";
       if (mysqli_query($conn, $sql)) {
        $_SESSION['Success'] = "account created";
        
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    // redirect to dashboard
    header("Location: ../signin.php");

} else {
 header("Location: ../index.php");
 die();
}

?>