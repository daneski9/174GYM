<!-- CODE FOR INSERTING A NEW MEMBER INTO THE DATABASE -->
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
    <h1 class = 'sign-up'>174 GYM MEMBER SIGN UP</h1>
    <br>
    <?php
    $connect;
    if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
    }
    //Retreiving the email from the form:
    $email = $_REQUEST['email'];
    //Retreiving max ID and incrementing by 1 for new members:
    $maxID = "SELECT MAX(memberID) as 'maxID' FROM member";
    $maxIDresult = $connect->query($maxID);
    while($row = $maxIDresult->fetch_assoc()) {
        $newMemberID =  $row['maxID']+1;
        }
    //Inserting new member information:
    $sql = "INSERT INTO member VALUES ('$newMemberID', null, null, '$email', null)";
    $connect->query($sql);
    //Redirect to index.php:
    header("Refresh: 0, url=index.php");
    

   $connect->close(); ?>
    

</body>
</html>