<?php
//require('model/database.php');
//require('model/accounts.php');
//Declaring variables
/*
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
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <title>IS 218</title>
</head>
<body>



<h1>Enter your question down below</h1>

<div>
    <form action="index.php" method="post" name="new-question-form">
        <input type="hidden" name="action" value="create_new_question">

        Question Title <input type="text" name="questionName" class="text-container">
        <br>
        <br>
        Enter your question:<br><textarea name="questionBody" class="text-container"></textarea>
        <br>
        Question Skills
        <br>
        <br>


        <div>
            <input type="checkbox" name="skills[]" value="PHP" id="php" checked>
            <label for="php">PHP</label>
            <br>

            <input type="checkbox" name="skills[]" value="Javascript" id="js">
            <label for="js">Javascript</label>

            <br>

            <input type="checkbox" name="skills[]" value="CSS" id="css">
            <label for="css">CSS</label>

            <br>

            <input type="checkbox" name="skills[]" value="HTML" id="html">
            <label for="html">HTML</label>

            <br>

            <input type="checkbox" name="skills[]" value="Java" id="java">
            <label for="java">Java</label>

            <br>

            <input type="checkbox" name="skills[]" value="Python" id="py">
            <label for="py">Python</label>
            <br>
        </div>



        <br>
        <input type="submit" value="Add" class="button">

    </form>

</div>



</body>
</html>

