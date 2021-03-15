<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    
   
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `covid`.`covid` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
         // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Covid-19 Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img class="bg" src="bk.jpg" alt="Covid-19">
    
    <div class="container">

        <h1>Welcome to Covid-19 Form</h1>
        <p>Enter your details and submit your details to confirm your participation</p>

        <?php

        if($insert == true){
          echo  "<p class='submitmsg'>Thanks for submitting your form. We are happy to see your participation</p>";
        }
       

    ?>
        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter Your name">

            <input type="text" name="age" id="age" placeholder="Enter Your Age">

            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">

            <input type="email" name="email" id="email" placeholder="Enter Your email">

            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone">

            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter Your opinion about getting vaccinated"></textarea>


            <button class="btn">Submit</button>
           

        </form>

    </div>

    <script src="index.js"></script>


  


</body>
</html>