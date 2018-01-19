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
        require_once ("config/database.php"); //подключаем конфигурационный файл базы данных
        $mysqli = new mysqli($dbip,$dblogin,$dbpassword,$dbname); //создаём обхект базы данных
        $sql = "SELECT * FROM vopros LIMIT 10"; //формируем запрос на выборку теста
        $result = $mysqli -> query($sql); //преобразуем в результат 
        $i = 0; //создаём итератор 
        while ($row = mysqli_fetch_assoc($result)) { //преобразуем результат в ассоциативный массив пока он имеет место быть
            switch ($row["type"]){ //выбираем по типу вопроса
                case 1: //сли это вопрос с радиокнопкой
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
            </div>'; //тогда выводим с радиокнопкой
                    break;
                case 2: //если вопрос с чекбоксом
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
            </div>'; //тогда выводим с чекбоксом
                    break;
            }
        $i++; //увеличиваем итератор
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
