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

        table {
            border: 1px solid black;
            width: 60%;
        }

        .tr {
            border: 1px solid black;
        }

        .td {
            border: 1px solid black;
            width: 30%;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $con = new PDO("mysql:host=localhost;dbname=univer", 'root', 'My$par0l');

    $sql = "SELECT * FROM talabalar";
    $statment = $con->query($sql);
    $talabalar = $statment->fetchAll(PDO::FETCH_ASSOC);

    $sql4 = "SELECT * FROM imtihon";
    $statment4 = $con->query($sql4);
    $imtihon = $statment4->fetchAll(PDO::FETCH_ASSOC);

    // foreach ($talabalar as $value) {
    //     foreach ($imtihon as $value2) {
    //         $count = "SELECT COUNT(talaba_id) FROM imtihon WHERE '{$value[id]}' = '{$value2['talaba_id;']}'";
    //         $statment5 = $con->query($sql4);
    //         $imtihon = $statment5->fetchAll(PDO::FETCH_ASSOC);
    //         // $sql2 = "INSERT INTO natijaa (name, imtihonlar_soni, urtacha_ball) VALUES ('{$value['name']}', '{}')";
    //     }
    // }
    ?>
    <ul align="center">
        <li><a href="index.php">Talaba</a></li>
        <li><a href="fanlar.php">Fanlar</a></li>
        <li><a href="imtihon.php">Imtihon</a></li>
        <li><a href="natija.php">Natija</a></li>
    </ul>
    <h1 align="center">Natija</h1>
    <table align="center">
        <tr class="tr">
            <th>ID</th>
            <th>Talaba</th>
            <th>Imtihonlar soni</th>
            <th>O'rtacha ball</th>
        </tr>
        <?php
        foreach ($talabalar as $value) { ?>
            <tr>
                <td class="td"><?= $value['id'] ?></td>
                <td class="td"><?= $value['name'] ?></td>
                <td class="td"><a href="Edit.php?id_edit=<?= $value['id'] ?>">Edit</a> <a href="Delete.php?id_del=<?= $value['id'] ?>">Delete</a></td>
            </tr>
        <?php }
        ?>
    </table>
</body>

</html>