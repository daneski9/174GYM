<!-- Code for inserting new members into the member table -->
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
    <h1 class = 'sign-up'>174 GYM MEMBER ACCOUNT</h1>
    <br>
    <?php
    $connect;
    if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
    }
    //Retreiving email from the form submission:
    $email = $_REQUEST['email'];
    //Retreiving max ID and incrementing by 1 for new members:
    $maxID = "SELECT MAX(memberID) as 'maxID' FROM member";
    $maxIDresult = $connect->query($maxID);
    while($row = $maxIDresult->fetch_assoc()){
        $newMemberID =  $row['maxID']+1;
    }
    //Inserting new member information into database (150 maximum members):
    if($newMemberID<150){
        $sql = "INSERT INTO member VALUES ('$newMemberID', null, null, '$email', null)";
        $connect->query($sql);
        header("Refresh: 0, url=index.php");
    }
    else{
        echo "The gym is full. Check back later!";
    }
   
   $connect->close(); ?>
    
</body>
</html>