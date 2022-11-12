<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/session/html_header.php';
?>
<html lang="ru">

<head>
    <title>Магазин</title>
    <style>
        a {
            text-decoration: none;
            font-size: 1.5rem;
            border: none
        }
    </style>
</head>

<body>
    <div id="wblock">
        <h1> Главная страница магазина</h1>
        <h2>Навигация</h2>
        <div>
            <ul>
                <li>
                    <a href="catalogue.php">Каталог</a>
                </li>
                <li>
                    <a href="admin.php">Админ панель</a>
                </li>
                <li>
                    <a href="session_test.php">Session Debug Page</a>
                </li>
                <li>
                    <a href="pdf/showPDF.php">PDF</a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>