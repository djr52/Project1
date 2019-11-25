<?php
require('model/database.php');
require('model/accounts.php');
//Declaring variables
$questionName = $_POST['questionName'];
$questionBody = $_POST['questionBody'];
$skills = $_POST['skills'];

session_start();
$emailAddress = $_SESSION['email'];


//Turns skill array into string
$skillsString = implode($skills, ', ');

if(empty($questionName) || strlen($questionName) < 3){
    echo nl2br("Please enter a title at least 3 characters long\n");
}
else{
    echo nl2br($questionName."\n");
}


if(empty($questionBody)){
    echo nl2br("Enter a question\n");

}
elseif(strlen($questionBody) > 500){
    echo nl2br("Please enter a question less than 500 characters\n");
}
else{
    echo nl2br($questionBody."\n");
}

if(count($skills) < 2){
    echo nl2br("Please enter at least 2 skills\n");
}
else{



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
    $firstName = getFirstName($emailAddress);
    $lastName = getLastName($emailAddress);

    $statement->closeCursor();

    header("Location: display-user-question.php?email=$emailAddress&firstname=$firstName&lastname=$lastName");





}

