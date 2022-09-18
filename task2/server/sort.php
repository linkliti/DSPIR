<!DOCTYPE html>
<html lang="ru">

<!-- ?array=5,3,2,5,8,1,0 -->

<head>
    <meta charset="UTF-8">
    <title>Сортировка</title>
    <style>
        body {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <?php

    function quickSort($array)
    {
        // единичный массив
        if (sizeof($array) <= 1) return $array;
        $pivot = $array[0]; // опора

        $left = $right = array(); // правая и левая части

        for ($i = 1; $i < sizeof($array); $i++) {
            if ($array[$i] < $pivot) {
                $left[] = $array[$i]; // добавление в левый массив (меньше опоры)
            } else {
                $right[] = $array[$i]; // добавление в правый массив (больше/равно опоры)
            }
        }
        // сортировка левых и правых частей
        return array_merge(quickSort($left), array($pivot), quickSort($right));
    }

    if (isset($_GET['array'])) {
        $array = explode(",", $_GET["array"]);
        // Массив
        echo "<p>Массив</p>";
        echo "<p>[";
        echo implode(", ", $array);
        echo "]</p>";

        // Отсортированный массив
        echo "<p>Отсортированный массив</p>";
        $array = quickSort($array);
        echo "<p>[";
        echo implode(", ", $array);
        echo "]</p>";
    } else {
        echo '<p>Отсутствует переменная: ?array=</p>';
    }

    ?>
</body>

</html>