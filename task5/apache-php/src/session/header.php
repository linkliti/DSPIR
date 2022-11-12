<div id="header">
    <?php if ($_SESSION['login'] != ' ') {
        echo '<h1>Добро пожаловать ' . $_SESSION['login'] . '</h1>';
    } ?>
    <input placeholder="Ваше имя">
    <button onclick="setLogin()">Задать имя</button>
    <button onclick="changeTheme()">Сменить тему</button>
</div>