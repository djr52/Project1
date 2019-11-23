<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <link href="login.php">
</head>
<body>

<h1>Hello</h1>



</body>
</html>





<?php
    require('database.php'); // REMEMBER TO PUT THIS TO ACTUALLY REFERENCE THE DATABASE

    $emailAddress = $_POST['email'];
    $password = $_POST['password'];


    if(empty($emailAddress)){
        echo "Please enter your E-mail";
    }
    elseif(!strpos($emailAddress, '@')){

        echo nl2br("\nPlease type a proper email address.") ;
    }



    if(empty($password) || strlen($password) < 8){
        echo nl2br("\nPlease enter a valid password. \n(Must be at least 8 characters long.)");
    }

    //SQL QUERY

    $query = 'SELECT * FROM accounts
            WHERE email = :email AND password = :password';

    $statement = $db->prepare($query);

    $statement->bindValue(':email', $emailAddress);
    $statement->bindValue(':password', $password);
    $statement->execute();

    $userName = $statement->fetch();

    if($userName > 0){
        
        header("Location: display-user-question.html");

    }
    else{
        echo "Bad Login";
    }

    $statement->closeCursor();






?>

