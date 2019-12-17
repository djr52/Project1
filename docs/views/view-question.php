
<?php include('abstract-views/header.php');  ?>


<div class="div-container">
    <?php $question['title'];?>
    <?php foreach ($question as $questionPart):?>
    <h1><?php echo $questionPart['title'];?></h1>
    <h3>
        <?php echo $questionPart['body'];?>
    </h3>
    <p>
        <?php echo " Score: ". $questionPart['score']?>
    </p>

    <p>
        <?php echo "Skills: " . $questionPart['skills']; ?>
    </p>

    <?php endforeach;?>

</div>

<?php include('abstract-views/footer.php');?>
