<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Фигуры</title>
    <style>
        svg>rect,
        svg>polygon,
        svg>circle {
            stroke: black;
            stroke-width: 1px;
        }

        body {
            font-size: 24px;
        }

        svg {
            height: 500px;
            width: 500px;
        }
    </style>
</head>

<body onload="runner()">
    <!-- JS START -->
    <input input="numbers" maxlength=7 id="binary" value="">
    <div id="decimal"></div>
    <script>
        // Конвертер двоич -> десятич
        // Обновление
        function runner() {
            window.setInterval(converter, 200);
        }
        // Конвертер
        function converter() {
            let binary = document.getElementById("binary");
            let decimal = document.getElementById("decimal");
            decimal.innerHTML = parseInt(binary.value, 2);
        }
        // Только 1 и 0
        document.getElementById('binary').addEventListener('keydown', function(e) {
            if (e.keyCode != 48 && e.keyCode != 49 && e.keyCode != 8) {
                e.preventDefault();
            }
        });
    </script>
    <!-- JS END -->
    <?php
    if (isset($_GET['num'])) {
        $num = $_GET['num']; // Получение переменной
        echo 'Число: ' . $num . ' Двоичный вид: '
            . sprintf("%07d", decbin(strval($num))) . '<br>';
        /* echo '<br>
        <a href="https://www.binaryhexconverter.com/decimal-to-binary-converter" target="_blank">Конвертер</a>'; */

        // 00    0 0 0  00
        // Shape R G B  Size
        $shape =    ($num >> 5) & 3; // 00-круг 01-прямоуг 10-квадр 11-треуг
        $red =      ($num >> 4) & 1;
        $green =    ($num >> 3) & 1; // RGB
        $blue =     ($num >> 2) & 1;
        $size =    (($num >> 0) & 3) + 1; // 00-мал 01-сред 10-бол 11-очбол
        // HEX цвет
        $color = '"#'
            . ($red == 1    ? 'ff' : "00")
            . ($green == 1  ? 'ff' : "00")
            . ($blue == 1   ? 'ff' : "00") . '"';
        // Увеличение размера
        $size = $size * 100;

        $shape_tag = '';
        switch ($shape) {
            case 0: // Круг
                $radius = ($size / 2);
                $shape_tag = "circle "
                    // Размер
                    . " cx=" . ($radius + 10) . " cy=" . ($radius + 10)
                    // Радиус
                    . " r=" . $radius . " ";
                break;
            case 1: // Прямоугольник
                $shape_tag = "rect "
                    // Размер
                    . "width=" . ($size * 2) . " height=" . ($size);
                break;
            case 2: // Квадрат
                $shape_tag = "rect "
                    // Размер
                    . "width=" . ($size) . " height=" . ($size);
                break;
            case 3: // Треугольник
                $side = $size;
                $shape_tag = "polygon points='"
                    // Точки
                    . ($side / 2 + 5) . ",10"
                    . " 10," . ($side) . " "
                    . ($side) . "," . ($side) . "'";
                break;
        }
        echo '<svg>';
        echo '<' . $shape_tag . ' fill=' . $color . '  />';
        echo '</svg>';
    } else {
        echo '<p>Отсутствует переменная: ?num=</p>';
    }
    ?>
</body>

</html>