
<?php include('abstract-views/header.php');  ?>


<div class="div-container">
    <h1>Hello! Please log in to your account</h1>

    <form action="index.php" method="post" name="login-page">
        <input type="hidden" name="action" value="validate_login">

        <div class="input-container">
            Email Address: <input type="email" name="email" class="text-container">
        </div>


        <br>
        <div class="input-container">
            Password: <input type="password" name="password" class="text-container">
        </div>

        <br>
        <input type="submit" value="Login" class="button">




    </form>
</div>

<?php include('abstract-views/footer.php');?>


