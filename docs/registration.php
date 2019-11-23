<?php

require('database.php');


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$birthDay = $_POST['birthDay'];
$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];



if(empty($firstName)){
    echo nl2br("\nPlease enter your first name.") ;
}


if(empty($lastName)){
    echo nl2br("\nPlease enter your last name.");
}
if(empty($birthDay)){
    echo nl2br("\nPlease enter your birthday.");
}

if(empty($emailAddress)){
    echo nl2br("\nPlease enter an email address.") ;
}
if(!strpos($emailAddress, '@')){

    echo nl2br("\nPlease type a proper email address.") ;
}


if(empty($password) || strlen($password) < 8){
    echo nl2br("\nPlease enter a valid password. \n(Must be at least 8 characters long.)");
}




else {
    echo nl2br("\nWelcome " . $firstName . " " . $lastName . "\n");
    echo nl2br($birthDay . "\n");
    echo nl2br($emailAddress . "\n");


    $query = 'INSERT INTO accounts
            (email, fname, lname, birthday, password)
          VALUES
            (:email, :fname, :lname, :birthday, :password)';

    $statement = $db->prepare($query);

    $statement->bindValue(':email', $emailAddress);
    $statement->bindValue(':fname', $firstName);
    $statement->bindValue(':lname', $lastName);
    $statement->bindValue(':birthday', $birthDay);
    $statement->bindValue(':password', $password);

    $statement->execute();

    $statement->closeCursor();
}