<?php include('abstract-views/header.php');  ?>
<div class="div-container">
    <div>
        <h1 class="title-header">All Posted Questions</h1>
    </div>
    <div>
        <table class="table">
            <tr>
                <th>Question ID</th>
                <th>Question Title</th>
                <th>Question Body</th>
                <th>Question Skills</th>
                <th>Score</th>
            </tr>
            <?php foreach ($questions as $question) : ?>
                <tr>
                    <td><?php echo $question['id'] ?></td>
                    <td><?php echo $question['title'] ?></td>
                    <td><?php echo $question['body'] ?></td>
                    <td><?php echo $question['skills']?></td>
                    <td><?php echo $question['score']?></td>
                    <td><a href=".?action=view_question&questionID=<?php echo $question['id']?>"><input type="button" value="View" class="button"></a></td>
                </tr>


            <?php endforeach;?>
        </table>



    </div>
    <div class="button-display">
        <a href=".?action=display_question_form"><input type="button" value="Add New Question" class="button"></a>
    </div>
    <div>
        <a href=".?action=display_questions"><input type="button" value="See Your Questions" class="button"></a>
    </div>

</div>
<?php include('abstract-views/footer.php');  ?>