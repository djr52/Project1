
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>IS218 PROJECT</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

</nav>


<div class="div-container">
    <h1>Hello! Please log in to your account</h1>

    <form action="index.php" method="post" name="login-page">
        <input type="hidden" name="action" value="validate_login">

        <div class="input-container">
            Email Address: <input type="email" name="email" class="text-container">
        </div>


        <br>
        <br>
        <div class="input-container">
            Password: <input type="password" name="password" class="text-container">
        </div>

        <br>
        <input type="submit" value="Login" class="button">




    </form>
</div>

<?php include('abstract-views/footer.php');?>


