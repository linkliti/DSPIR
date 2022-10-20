<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Каталог</title>
    <link rel="stylesheet" href="css/table.css" type="text/css" />
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
        <br><a href="index.html">На главную</a>
    </div>
    <?php $mysqli->close(); ?>
</body>

</html>