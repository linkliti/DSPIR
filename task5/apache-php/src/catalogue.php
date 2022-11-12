<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/session/html_header.php';
?>
<html lang="ru">

<head>
    <title>Каталог</title>
</head>

<body>
    <div id="wblock">
        <h1>Каталог</h1>
        <?php
        require_once '_helper.php';
        $mysqli = openmysqli();
        $result = $mysqli->query("select * from toys");
        ?>
        <table cellspacing="0" , style="width:100%">
            <tr>
                <th>Игрушка</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
            <?php if ($result->num_rows > 0) foreach ($result as $toy) {
                echo "
            <tr>
                <td>" . $toy['title'] . "</td>
                <td>" . $toy['description'] . "</td>
                <td>" . $toy['cost'] . " руб</td>
            </tr>
            ";
            }
            else echo ''; ?>
        </table>
        <br><a href="/index.php">На главную</a>
    </div>
    <?php $mysqli->close(); ?>
</body>

</html>