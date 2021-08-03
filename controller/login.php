<?php
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

//     // checking db
//     $myfile = fopen("../db.txt", "r") or die("Unable to open file!");
//         $f = fread($myfile,filesize("../db.txt"));

//        $arr = json_decode(json_encode($f), true);
// // echo $arr;
//         fclose($myfile);
            
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    // redirect to dashboard
    header("Location: ../dashboard/home.php");

} else {
 header("Location: ../index.php");
 die();
}

?>