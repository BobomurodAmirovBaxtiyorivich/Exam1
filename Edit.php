<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=univer", 'root', 'My$par0l');

if (isset($_GET['id_edit']) && isset($_POST['sub'])) {
    $name = $_POST['name'];
    $id = $_GET['id_edit'];

    $sql = "UPDATE talabalar SET name = '{$name}' WHERE id = '{$id}'";
    $con->exec($sql);
    $_SESSION['edit'] = "Talaba muvoffaqiyatli o'zgartirildi";
    header("location: index.php");
}
?>

<form action="" method="POST">
    <input type="text" name="name">
    <input type="submit" value="Submit" name="sub">
</form>