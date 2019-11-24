



<?php
    require('model/database.php'); // REMEMBER TO PUT THIS TO ACTUALLY REFERENCE THE DATABASE
    require('model/accounts.php');


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

    $userEmail = validateLogin($emailAddress, $password);
    if(!$userEmail){
        echo "Bad login";
    }
    else{

        $query = 'SELECT fname, lname FROM accounts WHERE
                    email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $emailAddress);

        $statement->execute();
        $name = $statement->fetch();

        $firstName = $name['fname'];
        $lastName = $name['lname'];


        header("Location: display-user-question.php?email=$emailAddress&firstname=$firstName&lastname=$lastName");
    }








?>

