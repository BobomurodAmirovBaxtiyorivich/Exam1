<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=univer", 'root', 'My$par0l');

if (isset($_GET['id_del'])) {
    $id = $_GET['id_del'];

    $sql = "DELETE FROM fanlar WHERE id = '{$id}'";
    $con->exec($sql);
    $_SESSION['edit'] = "Fan o'chirildi";
    header("location: fanlar.php");
}
?>