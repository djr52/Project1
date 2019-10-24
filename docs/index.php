<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <link href="index.php">
</head>
<body>

<h1>Henlo</h1>

</body>
</html>





<?php

    $emailAddress = $_POST['email'];
    if(empty($emailAddress)){
        echo "Please enter your E-mail";
    }
    if(!strpos($emailAddress, '@')){

        echo nl2br("\nPlease type a proper email address.") ;
    }

    $password = $_POST['password'];
    if(empty($password) || strlen($password) < 8){
        echo nl2br("\nPlease enter a valid password. \n(Must be at least 8 characters long.)");
    }


?>

