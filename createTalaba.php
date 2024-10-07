<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name">
        <input type="submit" value="Submit" name="sub">
    </form>
</body>
</html>

<?php

session_start();
$con = new PDO("mysql:host=localhost;dbname=univer", 'root', 'My$par0l');

if (isset($_POST['sub']) && !empty($_POST['name'])) {
    $name = $_POST['name'];

    $sql = "INSERT INTO talabalar (name) VALUES('{$name}')";
    $con->exec($sql);
    $_SESSION['sub'] = "Talaba muvoffaqiyatli qo'shildi";
    header("location: index.php");
}

?>