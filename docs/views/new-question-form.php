
<?php include('abstract-views/header.php');  ?>

<div>
    <h1>Enter your question down below</h1>
</div>


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

<?php include('abstract-views/footer.php');  ?>

