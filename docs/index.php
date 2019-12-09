<?php
require("model/database.php");
require("model/accounts.php");
require("model/questions.php");

$action = filter_input(INPUT_POST, 'action');

if($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL){
        $action = 'display_login';
    }
}

switch($action){

    case 'display_login':{
        include('views/login.php');
        break;
    }
    case 'validate_login':{
        $emailAddress = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ($emailAddress == NULL || $password == NULL) {
            $error = "Email and Password is invalid";
            echo $error;
        } else {
            $userEmail = validateLogin($emailAddress, $password);
            echo "User email IS: $userEmail";
            if ($userEmail == false) {
                header("Location: .?action=display_registration");
            } else {
                header("Location: .?action=display_questions&userEmail=$userEmail");
            }
        }
        break;
    }

    case 'display_registration':{
        $emailAddress = filter_input(INPUT_POST, 'emailAddress');
        $password = filter_input(INPUT_POST, 'password');
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $birthDay = filter_input(INPUT_POST, 'birthDay');
        if(empty($emailAddress) || (empty($password) || strlen($password) < 8) || empty($firstName) || empty($lastName) || empty($birthDay)){
            $error = "Invalid credentials, make sure everything is filled out and your password has more than 8 characters";
            echo $error;

        }
        else{
            createNewUser($emailAddress,$firstName,$lastName,$birthDay,$password);
            header("Location: .?action=display_login");
        }


        include('views/registration.php');


        break;

    }
    case 'display_questions':{
        $userEmail = filter_input(INPUT_GET, 'userEmail');
        if($userEmail == NULL || $userEmail < 0){
            header('.?action=display_login');
        }
        else{
            $questions = getQuestionsByEmail($userEmail);
            $firstName = getFirstName($userEmail);
            $lastName = getLastName($userEmail);
            include('views/display-user-question.php');
        }

        break;

    }

    case 'display_question_form':{
        $userEmail = filter_input(INPUT_GET, 'userEmail');
        include('views/new-question-form.php');
        $questionName = filter_input(INPUT_POST, 'questionName');
        $questionBody = filter_input(INPUT_POST, 'questionBody');
        $skills = filter_input(INPUT_POST, 'skills');




        //Turn array into string
        $skillsString = implode($skills, ', ');

        if($questionName == NULL || $questionBody == NULL)
        {
            $error = "Please fill out the areas, select at least 2 skills, and keep the body under 500 characters";
            echo $error;

        }
        else{

            createNewQuestion($userEmail, $questionName,$questionBody,$skillsString);
            header("Location: .?action=display_questions&userEmail=$userEmail");

        }




    }

}
