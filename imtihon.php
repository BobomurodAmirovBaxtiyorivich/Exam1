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

        .save{
            border: 1px solid blue;
            border-radius: 3px;
            color: black;
        }

        .save:hover{
            background-color: blue;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $con = new PDO("mysql:host=localhost;dbname=univer", 'root', 'My$par0l');

    $sql4 = "SELECT * FROM imtihon";
    $statment4 = $con->query($sql4);
    $imtihon = $statment4->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM talabalar";
    $statment = $con->query($sql);
    $talabalar = $statment->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT * FROM fanlar";
    $statment2 = $con->query($sql2);
    $fanlar = $statment2->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['sub'])) {
        if (!empty($_POST['talaba']) && !empty($_POST['fan']) && !empty($_POST['ball'])) {
            $talaba_id = $_POST['talaba'];
            $fan_id = $_POST['fan'];
            $ball = $_POST['ball'];

            $prof = false;

            foreach ($imtihon as $value) {
                if ($talaba_id == $value['talaba_id'] && $fan_id == $value['fan_id']) {
                    $prof = true;
                }
            }

            if ($prof == false) {
                $sql3 = "INSERT INTO imtihon (talaba_id, fan_id, ball) VALUES ('{$talaba_id}', '{$fan_id}', '{$ball}')";
                $con->exec($sql3);
            }
        } else {
            echo "<h1 align='center'>Ma'lumotlar to'liq kiritilmagan</h1>";
        }
    }
    ?>
    <ul align="center">
        <li><a href="index.php">Talaba</a></li>
        <li><a href="fanlar.php">Fanlar</a></li>
        <li><a href="imtihon.php">Imtihon</a></li>
        <li><a href="natija.php">Natija</a></li>
    </ul>
    <h1 align="center">Imtihon</h1>
    <?php
    if (isset($_SESSION['warning'])) { ?>
        <h1 align="center"><?= $_SESSION['warning'] ?></h1>
        <?php
        unset($_SESSION['warning']);
        session_destroy();
        ?>
    <?php }
    ?>
    <?php
    if (isset($_SESSION['cong'])) { ?>
        <h1 align="center"><?= $_SESSION['cong'] ?></h1>
        <?php
        unset($_SESSION['cong']);
        session_destroy();
        ?>
    <?php }
    ?>
    <form align="center" action="" method="POST">
        <select name="talaba">
            <option value="">Talabalar</option>
            <?php
            foreach ($talabalar as $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
            <?php }
            ?>
        </select>
        <select name="fan">
            <option value="">Fanlar</option>
            <?php
            foreach ($fanlar as $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
            <?php }
            ?>
        </select>
        <input type="number" name="ball" placeholder="ball"> <br><br>
        <input class="save" type="submit" value="Save" name="sub">
    </form>
</body>

</html>