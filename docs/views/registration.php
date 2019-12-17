<?php



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
        <input type="hidden" name="action" value="create_registration">
        <div>
            First Name: <input type="text" name="firstName" class="text-container">
        </div>

        <br/>
        <div>
            Last Name: <input type="text" name="lastName" class="text-container">
        </div>

        <br>
        <div>
            Birthday: <input type="date" name="birthDay" class="text-container">
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
