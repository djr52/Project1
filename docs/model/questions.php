<?php
require('database.php');

function getQuestionsByEmail($emailAddress){
    global $db;
    $query = 'SELECT * FROM questions WHERE owneremail = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $emailAddress);
    $statement->execute();

    $questions = $statement->fetchAll();

    $statement->closeCursor();
    return $questions;

}
function createNewQuestion($emailAddress, $questionName, $questionBody, $skillsString){
    global $db;
    $query = 'INSERT INTO questions
            (owneremail, title, body, skills)
            VALUES
            (:email, :title, :body, :skills) ';
    $statement = $db->prepare($query);

    $statement->bindValue(':email', $emailAddress);
    $statement->bindValue(':title', $questionName);
    $statement->bindValue(':body', $questionBody);
    $statement->bindValue(':skills', $skillsString);

    $statement->execute();
    //$firstName = getFirstName($emailAddress);
    //$lastName = getLastName($emailAddress);

    $statement->closeCursor();

}