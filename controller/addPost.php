<?php
session_start();

require('../database/db.php');

$errors = array();
$id = $_SESSION["id"];/* userid of the user */

if (isset($_POST['submit'])) {
    $title =  mysqli_real_escape_string($conn, $_POST['title']);
    $body =  mysqli_real_escape_string($conn, $_POST['body']) ;
    
    if (empty($title)) {
       array_push($errors,"Title is required");
         $_SESSION['Error'] = $errors;
        header("Location: ../dashboard/addPost.php"); 
        die();     
    }

    // validation for body
    if(empty($body)) {
       array_push($errors,"Body is required");
        $_SESSION['Error'] = $errors;
        header("Location: ../dashboard/addPost.php"); 
        die();  
    }


    // check if post already exist
    $post = "SELECT title FROM Posts WHERE title='$title'";
    $result = mysqli_query($conn, $post);

if (mysqli_num_rows($result) > 0) {
      array_push($errors,"Post already exist");
    $_SESSION['Error'] = $errors;
    header("Location: ../dashboard/addPost.php");
    die();  
} 

// now saving it to database
//    store in database
        $sql = "INSERT INTO Posts (title, body, createdBy)
        VALUES ('$title', '$body', '$id')";
       if (mysqli_query($conn, $sql)) {
        $_SESSION['Success'] = "Post created";        
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    // redirect to dashboard
    header("Location: ../dashboard/addPost.php"); 

}else {
    header("Location: ../dashboard/addPost.php"); 
    die();
}


?>