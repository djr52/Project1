


<?php
/*
require('docs/model/database.php');
require('model/accounts.php');
require('model/questions.php');

$firstName = filter_input(INPUT_GET, 'firstname');
$lastName = filter_input(INPUT_GET, 'lastname');
$emailAddress = filter_input(INPUT_GET, 'email');

session_start();

$_SESSION['email'] = $emailAddress;

*/



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IS 218</title>
    <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>
<body class="display-question-body">
<div class="div-container">
    <div>

        <h1><?php echo $firstName . " " . $lastName . "'s"; ?> Posted Questions</h1>


    </div>
    <div>
        <table class="table">
            <tr>
                <th>Question ID</th>
                <th>Question Title</th>
                <th>Question Body</th>
                <th>Question Skills</th>
            </tr>
            <?php foreach ($questions as $question) : ?>
                <tr>
                    <td><?php echo $question['id'] ?></td>
                    <td><?php echo $question['title'] ?></td>
                    <td><?php echo $question['body'] ?></td>
                    <td><?php echo $question['skills']?></td>
                    <td><a href=".?action=delete_question&questionID=<?php echo $question['id']?>"><input type="button" value="Delete"></a></td>
                </tr>


            <?php endforeach;?>
        </table>


    </div>
    <div class="button-display">
        <a href=".?action=display_question_form&userEmail=<?php echo $userEmail;?>"><input type="button" value="Add New Question" class="add-question-button"></a>
    </div>
</div>


</body>
</html>

