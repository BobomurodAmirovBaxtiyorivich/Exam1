<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li {
            display: inline;
            margin-right: 10px;
        }

        a {
            border: 1px solid aqua;
            border-radius: 2px;
            text-decoration: none;
            color: black;
        }

        a:hover {
            background-color: aqua;
        }

        table{
            border: 1px solid black;
            width: 60%;
        }

        .tr{
            border: 1px solid black;
        }

        .td{
            border: 1px solid black;
            width: 30%;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $con = new PDO("mysql:host=localhost;dbname=univer", 'root', 'My$par0l');
    
    $sql = "SELECT * FROM fanlar";
    $statment = $con->query($sql);
    $fanlar = $statment->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <ul align="center">
        <li><a href="index.php">Talaba</a></li>
        <li><a href="fanlar.php">Fanlar</a></li>
        <li><a href="imtihon.php">Imtihon</a></li>
        <li><a href="natija.php">Natija</a></li>
    </ul>
    <h1 align="center">Fanlar</h1>
    <?php
    if (isset($_SESSION['sub'])) { ?>
        <h1 align="center"><?= $_SESSION['sub'] ?></h1>
        <?php
        unset($_SESSION['sub']);
        session_destroy();
        ?>
    <?php }
    ?>
    <?php
    if (isset($_SESSION['edit'])) { ?>
        <h1 align="center"><?= $_SESSION['edit'] ?></h1>
        <?php
        unset($_SESSION['edit']);
        session_destroy();
        ?>
    <?php }
    ?>
    <h3 align="center"><a href="createFan.php">Add new</a></h3>
    <table align="center">
        <tr class="tr">
            <th>ID</th>
            <th>Name</th>
            <th>Options</th>
        </tr>
        <?php
        foreach ($fanlar as $value) { ?>
            <tr class="tr">
                <td class="td"><?= $value['id']?></td>
                <td class="td"><?= $value['name']?></td>
                <td class="td"><a href="fanEdit.php?id_edit=<?= $value['id']?>">Edit</a> <a href="fanDel.php?id_del=<?= $value['id']?>">Delete</a></td>
            </tr>
        <?php }
        ?>
    </table>
</body>

</html>