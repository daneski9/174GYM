<?php 
    include_once 'includes/includes.php'; #path to the file 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM MANAGEMENT DATABASE</title>
</head>
<body>
    <?php
    $connect;
    if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
    }

    echo "Connection succes!";
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