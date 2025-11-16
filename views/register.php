<?php
require "../model/Database.php";
session_start();
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Registrati</h2>
    <form method="post" action="../controls/register.php">
        <label>Username: </label><br>
        <input type="text" name="nome"><br>
        <label>Password: </label><br>
        <input type="password" name="password">
        <button type="submit">Registra un nuovo account</button>
    </form>
</body>

</html>