<?php
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
        array_push($errors,"Username is too short");
        $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");
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
    }  elseif ($password !== $Cpassword) {
         array_push($errors,"Password mismatch");
        $_SESSION['Error'] = $errors;
        header("Location: ../signup.php");
        die();  
    }
    
    // save to file
    $saveData = fopen("../db.txt", "w") or die("Unable to open file!");

        $cars = array(
        array(
            'email' => $email
        ),
        array(
            'username' => $username
        ),
        array(
            'password' => $password
        )
        );


    $txt = json_encode($cars);
    fwrite($saveData, $txt);

    fclose($saveData);

    // redirect to dashboard
    header("Location: ../signin.php");

} else {
 header("Location: ../index.php");
 die();
}

?>