<?php
//Declaring variables
$questionName = $_POST['questionName'];
$questionBody = $_POST['questionBody'];
$skills = $_POST['skills'];

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



echo $skillsString;