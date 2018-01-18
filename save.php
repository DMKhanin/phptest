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

                require_once ("config/database.php");
                if (!empty($_POST["username"])){
                    $mysqli = new mysqli($dbip,$dblogin,$dbpassword,$dbname);
                    $sql = "SELECT * FROM vopros LIMIT 10";
                    $result = $mysqli -> query($sql);
                    $otvetsarray = array();
                    $i = 0;

                    $vernih = 0;
                    $nevernih = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $otvetsarray[$i] = $row["otvet"];
                        $i++;
                    }

                    //4 I

                    for ($q = 0; $q <= $i-1;$q++){
                        //echo "---- <br>";
                        //  print_r($_POST[$q]);
                        if(count($_POST[$q])>1){
                            $_POST[$q] = implode(",", $_POST[$q]);
                        } else {
                            $_POST[$q] = $_POST[$q][0];
                        }
                        //echo $_POST[$q] . " = " . $otvetsarray[$q] . "<br>";
                        if ($_POST[$q] == $otvetsarray[$q]){
                            $vernih++;
                        } else {
                            $nevernih++;
                        }
                        $arr[$q] = $result;
                    }



                    $sql = "INSERT INTO users (username,vernih,nevernih) VALUES ('" . $_POST["username"] . "','" . $vernih . "','" .  $nevernih . "')";
                    $mysqli -> query($sql);
                    echo "<p class='logotype' style='padding: 15px'>" . $_POST["username"] . "</p>";
                    echo "Верных ответов: " . $vernih . "<br>Не верных ответов: " . $nevernih;
                } else {
                    echo "Пустое имя пользователя!";
                }
                ?>
            </div>
        </div>
        <div class="footer">

        </div>
    </div>
</body>
</html>
