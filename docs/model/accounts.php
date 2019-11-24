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
