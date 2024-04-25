<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $Fname=$_POST['fname'];
    $Lname= $_POST['lname']; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>receiveForm</title>
</head>
<body>
    <h1>Data Received Sucessfully...</h1>
    <br>
    <h3>My First Name is: <?php echo $Fname?></h3>
    <br>
    <h3>My Last Name is: <?php echo $Lname?></h3>

</body>
</html>