<?php 
    include_once 'includes/dbinfo.php'; #path to the file 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>GYM MANAGEMENT DATABASE</title>
</head>
<body>
    <h1>Dane! - Testing my Database connection: Using herokus database server with mysql:</h1>
    <br>
    <?php
    $connect;
    if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
    }

    $sql = "SELECT gymID, email FROM gym";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo "gymID: " . $row["gymID"]. " - email: " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }
   $connect->close();
   ?>

</body>
</html>