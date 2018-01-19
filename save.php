<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1 class="logotype">Результат прохождение теста</h1>
    </div>
        <div class="content">
            <div class="block" style="text-align: center">
                <?php

                require_once ("config/database.php"); //подключение файла базы данных
                if (!empty($_POST["username"])){ //проверка на пустое поле фамилии имени отчества
                    $mysqli = new mysqli($dbip,$dblogin,$dbpassword,$dbname); //создаём объект бд и подключаемся
                    $sql = "SELECT * FROM vopros LIMIT 10"; //формируем запрос к базе данных
                    $result = $mysqli -> query($sql); //отправляем запрос в базу данных
                    $otvetsarray = array(); //создаём переменную типа массив
                    $i = 0; //создаём итератор

                    $vernih = 0; //создаём переменную для верных ответов
                    $nevernih = 0; //создаём переменную для не верных ответов

                    while ($row = mysqli_fetch_assoc($result)) { //преобразуем результат полученный из mysql в ассоциативный массив пока результат имеет мевсто быть
                        $otvetsarray[$i] = $row["otvet"]; //присваиваем в массив ответ
                        $i++; //увеличиваем итератор на 1
                    }

                    //4 I

                    for ($q = 0; $q <= $i-1;$q++){ //запускаем цикл для проверки от 0 до количества вопросов
                        //echo "---- <br>";
                        //  print_r($_POST[$q]);
                        if(count($_POST[$q])>1){ // если мы получили из формы массив содержпщий более одного элемента тогда
                            $_POST[$q] = implode(",", $_POST[$q]); //склеиваем его в строку через запятую
                        } else { //иначе
                            $_POST[$q] = $_POST[$q][0]; //просто вытаскивем нулевой элемент из него
                        }
                        //echo $_POST[$q] . " = " . $otvetsarray[$q] . "<br>";
                        if ($_POST[$q] == $otvetsarray[$q]){ //если ответ полученный из формы равен ответу в массиве тогда
                            $vernih++; //увеличиваем счётчик верных ответов на 1
                        } else { //иначе
                            $nevernih++; //увеличиваем счётчик не верных ответов на 1
                        }
                        $arr[$q] = $result; 
                    }



                    $sql = "INSERT INTO users (username,vernih,nevernih) VALUES ('" . $_POST["username"] . "','" . $vernih . "','" .  $nevernih . "')"; //формируем запрос к базе данных на запись пользователя
                    $mysqli -> query($sql); //отправляем запрос
                    echo "<p class='logotype' style='padding: 15px'>" . $_POST["username"] . "</p>"; //выводим имя пользователя на страницу
                    echo "Верных ответов: " . $vernih . "<br>Не верных ответов: " . $nevernih; //выводим результат выполнения теста на страницу
                } else { //иначе
                    echo "Пустое имя пользователя!"; //выводим сообщение о пустом имени пользователя
                }
                ?>
            </div>
        </div>
        <div class="footer">

        </div>
    </div>
</body>
</html>
