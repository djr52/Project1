<?php
require("model/database.php");
require("model/accounts.php");
require("model/questions.php");

$action = filter_input(INPUT_POST, 'action');


session_start();
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
            if ($userEmail == false) {
                header("Location: .?action=display_registration");
            } else {

                setcookie('login', $userEmail, time() + (7200), "/");
                header("Location: .?action=display_questions");
            }
        }
        break;
    }

    case 'display_registration':{
        include('views/registration.php');
        break;
    }
    case 'create_registration':{
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
        break;

    }
    case 'display_questions':{

        $userEmail = $_COOKIE['login'];
        if($userEmail == NULL || $userEmail < 0){
            header('.?action=display_login');
        }
        else{
            $questions = getQuestionsByEmail($userEmail);
            $fullName = getFullName($userEmail);
            include('views/display-user-question.php');

        }

        break;

    }
    case 'all_questions':{
        $questions = getAllQuestions();

        include('views/display-all-questions.php');
        break;
    }
    case 'delete_question':{

        //session_start();
        $userEmail = $_COOKIE['login'];

        $questionID = filter_input(INPUT_GET, 'questionID');
        $questions = getQuestionsByEmail($userEmail);
        foreach($questions as $question){
            if($question['id'] == $questionID){
                deleteQuestion($questionID);
                header("Location: .?action=display_questions");
            }
            else{
                echo "error";
            }

        }
        break;
    }
    case 'view_question':{
        $questionID = filter_input(INPUT_GET, 'questionID');

        $question = getOneQuestion($questionID);
        include('views/view-question.php');
        break;
    }

    case 'display_question_form':{
        include('views/new-question-form.php');
        break;
    }
    case 'create_new_question':{

        $userEmail = $_COOKIE['login'];


        $questionName = filter_input(INPUT_POST, 'questionName');
        $questionBody = filter_input(INPUT_POST, 'questionBody');
        $skills = filter_input(INPUT_POST, 'skills',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        //Turn array into string
        $skillsString = implode($skills, ', ');


        if($questionName == NULL || ($questionBody == NULL || strlen($questionBody) > 500) || count($skills) < 2)
        {
           $error = "Please fill out the areas, select at least 2 skills, and keep the body under 500 characters";
           echo $error;
        }
        else{
           createNewQuestion($userEmail, $questionName, $questionBody, $skillsString);
           header("Location: .?action=display_questions");

        }

        break;
    }
    case 'logout':{
        session_destroy();
        unset($_COOKIE);
        setcookie('login', "", time() - (3600), "/");

        header("Location: .?action=display_login");
    }


}
