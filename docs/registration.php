<?php


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

$password = $_POST['password'];
if(empty($password) || strlen($password) < 8){
    echo nl2br("\nPlease enter a valid password. \n(Must be at least 8 characters long.)");
}
