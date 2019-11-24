<?php
$username = "djr52";
$password = "OWTI6DtxJ";
$hostname = "sql1.njit.edu";

$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $db = new PDO($dsn, $username, $password);
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

