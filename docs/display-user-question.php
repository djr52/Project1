


<?php
require('model/database.php');
require('model/accounts.php');
require('model/questions.php');

$firstName = filter_input(INPUT_GET, 'firstname');
$lastName = filter_input(INPUT_GET, 'lastname');
$emailAddress = filter_input(INPUT_GET, 'email');

session_start();

$_SESSION['email'] = $emailAddress;





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
                <th>Email</th>
                <th>Question Title</th>
                <th>Question Body</th>
            </tr>
            <?php $questions = getQuestionsByEmail($emailAddress); ?>
            <?php foreach ($questions as $question) : ?>
                <tr>
                    <td><?php echo $question['owneremail'] ?></td>
                    <td><?php echo $question['title'] ?></td>
                    <td><?php echo $question['body'] ?></td>
                </tr>

            <?php endforeach;  ?>
        </table>


    </div>
    <div class="button-display">
        <a href="new-question-form.html"><input type="button" value="Add New Question" class="add-question-button"></a>
    </div>
</div>


</body>
</html>

