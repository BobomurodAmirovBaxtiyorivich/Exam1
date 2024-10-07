<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=univer", 'root', 'My$par0l');

if (isset($_GET['id_del'])) {
    $id = $_GET['id_del'];

    $sql = "DELETE FROM talabalar WHERE id = '{$id}'";
    $con->exec($sql);
    $_SESSION['edit'] = "Talaba o'chirildi";
    header("location: index.php");
}
?>