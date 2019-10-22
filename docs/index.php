
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




