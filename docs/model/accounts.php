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
function createNewUser($emailAddress, $firstName, $lastName, $birthDay, $password){
    global $db;
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

function getFullName($emailAddress){
    global $db;
    $query = 'SELECT fname, lname FROM accounts WHERE
                    email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $emailAddress);

    $statement->execute();
    $name = $statement->fetch();
    $fullName = array($name['fname'], $name['lname']);

    return $fullName;
}