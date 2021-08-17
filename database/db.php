<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myCourse";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else {
    echo "Connected successfully";
}


// Create database
$sql = "CREATE DATABASE IF NOT EXISTS myCourse";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}


// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(255),
passwrd VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

?>