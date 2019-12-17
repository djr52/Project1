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
            (owneremail, createddate, title, body, skills)
            VALUES
            (:email, CURRENT_TIME, :title, :body, :skills) ';

    $statement = $db->prepare($query);

    $statement->bindValue(':email', $emailAddress);
    $statement->bindValue(':title', $questionName);
    $statement->bindValue(':body', $questionBody);
    $statement->bindValue(':skills', $skillsString);

    $statement->execute();


    $statement->closeCursor();

}
function deleteQuestion($questionID){
    global $db;
    $query = 'DELETE FROM questions
                WHERE id = :questionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':questionID', $questionID);
    $statement->execute();

    $statement->closeCursor();
}

function getOneQuestion($questionID){
    global $db;
    $query = 'SELECT * FROM questions
                WHERE id = :questionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':questionID', $questionID);
    $statement->execute();

    $question = $statement->fetchAll();

    $statement->closeCursor();


    return $question;

}
function getAllQuestions(){
    global $db;
    $query = 'SELECT * FROM questions';
    $statement = $db->prepare($query);

    $statement->execute();

    $questions = $statement->fetchAll();

    $statement->closeCursor();
    return $questions;

}
