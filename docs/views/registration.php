<?php


/*

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$birthDay = $_POST['birthDay'];
$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];



if(empty($firstName)){
    echo nl2br("\nPlease enter your first name.") ;
}


if(empty($lastName)){
    echo nl2br("\nPlease enter your last name.");
}
if(empty($birthDay)){
    echo nl2br("\nPlease enter your birthday.");
}

if(empty($emailAddress)){
    echo nl2br("\nPlease enter an email address.") ;
}
if(!strpos($emailAddress, '@')){

    echo nl2br("\nPlease type a proper email address.") ;
}


if(empty($password) || strlen($password) < 8){
    echo nl2br("\nPlease enter a valid password. \n(Must be at least 8 characters long.)");
}




else {

    createNewUser($emailAddress, $firstName, $lastName, $birthDay, $password);

    header("Location: login.html");

}
*/
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <title></title>
</head>
<body>


<div class="div-container">
    <h1>Please register an account down below.</h1>


    <form action="index.php" method="post" name="register-page">
        <input type="hidden" name="action" value="display_registration">
        <div>
            First Name: <input type="text" name="firstName" class="text-container">
        </div>

        <br/>
        <div>
            Last Name: <input type="text" name="lastName" class="text-container">
        </div>

        <br>
        <div>
            Birthday: <input type="text" name="birthDay" class="text-container">
        </div>

        <br>
        <div>
            Email Address: <input type="email" name="emailAddress" class="text-container">
        </div>

        <br>
        <div>
            Password: <input type="password" name="password" class="text-container">
        </div>

        <br>
        <input type="submit" value="Register" class="button">




    </form>
</div>


</body>
