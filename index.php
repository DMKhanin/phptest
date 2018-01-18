<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
    <div class="header">
        <h1 class="logotype">PHP TEST APULALA POMINKI</h1>
    </div>
    <div class="content">
        <form method="post" action="save.php">
        <input name="username" type="text" value="" placeholder="Фамилия Имя Отчество">
        <?php
        require_once ("config/database.php");
        $mysqli = new mysqli($dbip,$dblogin,$dbpassword,$dbname);
        $sql = "SELECT * FROM vopros LIMIT 10";
        $result = $mysqli -> query($sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            switch ($row["type"]){
                case 1:
                    echo '
            <div class="block">
                <p class="vopros">' . $row["vopros"] . '</p>
                <label for="' . ($row["id"] * $i)  . '">'. $row["otv1"] .'</label>
                <input name="' . $i . '" value="1" id="' . $row["id"] * $i  . '" type="radio">
                <label for="' . ($row["id"] * $i +1)  . '">'. $row["otv2"] .'</label>
                <input name="' . $i . '" value="2" id="' . ($row["id"] * $i +1)  . '" type="radio">
                <label for="' . ($row["id"] * $i +2)  . '">'. $row["otv3"] .'</label>
                <input name="' . $i . '" value="3" id="' . ($row["id"] * $i +2)  . '" type="radio">
                <label for="' . ($row["id"] * $i +3)  . '">'. $row["otv4"] .'</label>
                <input name="' . $i . '" value="4" id="' . ($row["id"] * $i +3)  . '" type="radio">
            </div>';
                    break;
                case 2:
                    echo '
            <div class="block">
                <p class="vopros">' . $row["vopros"] . '</p>
                <label for="' . ($row["id"] * $i)  . '">'. $row["otv1"] .'</label>
                <input name="' . $i . '[]" value="1" id="' . $row["id"] * $i  . '" type="checkbox">
                <label for="' . ($row["id"] * $i +1)  . '">'. $row["otv2"] .'</label>
                <input name="' . $i . '[]" value="2" id="' . ($row["id"] * $i +1)  . '" type="checkbox">
                <label for="' . ($row["id"] * $i +2)  . '">'. $row["otv3"] .'</label>
                <input name="' . $i . '[]" value="3" id="' . ($row["id"] * $i +2)  . '" type="checkbox">
                <label for="' . ($row["id"] * $i +3)  . '">'. $row["otv4"] .'</label>
                <input name="' . $i . '[]" value="4" id="' . ($row["id"] * $i +3)  . '" type="checkbox">
            </div>';
                    break;
            }
        $i++;
        }
            ?>
        <input type="submit" value="Закончить тест">
        </form>
    </div>
    <div class="footer">
        Футер
    </div>
    </div>
</body>
</html>