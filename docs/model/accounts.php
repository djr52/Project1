<?php

require('database.php');
function validateLogin($emailAddress, $password)
{


    global $db;
    $query = 'SELECT * FROM accounts
            WHERE email = :email AND password = :password';

    $statement = $db->prepare($query);

    $statement->bindValue(':email', $emailAddress);
    $statement->bindValue(':password', $password);
    $statement->execute();

    $user = $statement->fetch();

    if (count($user) > 0) {
        $userEmail = $user['email'];
        $statement->closeCursor();
        return $userEmail;
    }
    else {
        $statement->closeCursor();
        return false;

    }
}
function getFirstName($emailAddress){
    global $db;
    $query = 'SELECT fname FROM accounts WHERE
                    email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $emailAddress);

    $statement->execute();
    $name = $statement->fetch();

    $firstName = $name['fname'];
    return $firstName;
}
function getLastName($emailAddress){
    global $db;
    $query = 'SELECT lname FROM accounts WHERE
                    email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $emailAddress);

    $statement->execute();
    $name = $statement->fetch();

    $lastName = $name['lname'];
    return $lastName;
}
