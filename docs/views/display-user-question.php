<?php include('abstract-views/header.php');  ?>
<div class="div-container">
    <div>
        <h1 class="title-header"><?php echo $fullName[0] . " " . $fullName[1] . "'s"; ?> Posted Questions</h1>
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
                    <td><a href=".?action=view_question&questionID=<?php echo $question['id']?>"><input type="button" value="View" class="button"></a></td>
                    <td><a href=".?action=delete_question&questionID=<?php echo $question['id']?>"><input type="button" value="Delete" class="button"></a></td>
                </tr>


            <?php endforeach;?>
        </table>



    </div>
    <div class="button-display">
        <a href=".?action=display_question_form"><input type="button" value="Add New Question" class="button"></a>
    </div>
    <div>
        <a href=".?action=all_questions"><input type="button" value="Find All Questions" class="button"></a>
    </div>
</div>

<?php include('abstract-views/footer.php');  ?>
