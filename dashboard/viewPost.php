<?php  

session_start();
require('../database/db.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $id = $_SESSION["id"];/* userid of the user */
    $sql = "SELECT * FROM Posts WHERE createdBy='$id'";
    $result = mysqli_query($conn, $sql);

    echo "<table border='1'  style='width: 60%; margin:auto' >
       <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Body</th>
            <th>Actions</th>
       </thead>";

        if($result) {
            while($rows = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $rows['id'] . "</td>";
        echo "<td>" . $rows['title'] . "</td>";
        echo "<td>" . $rows['body'] . "</td>";
        echo "<td> 
        <a href='' >View</a> 
        &nbsp;&nbsp;
        <a href='' >Update</a> 
&nbsp;&nbsp;
        <form>
            <input type='submit' name='delete' value='Delete'/>
        </form>
        </td>";
        echo "</tr>";
        }
        echo "</table>";
        mysqli_close($conn);
        }

    ?>
      <a href="../dashboard/home.php">Go Back</a>

</body>
</html>