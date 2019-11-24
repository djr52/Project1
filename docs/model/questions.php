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