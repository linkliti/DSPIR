<?php require_once '_helper.php';
const cookie = 'auth';

header('Access-Control-Allow-Origin: *');

$name = $_GET[name];
$password = $_GET[password];
if (strlen($name) === 0 || strlen($password) === 0) {
    header('Location: ' . '../static/signin.html?e=1');
}

$mysqli = openMysqli();
$statement = $mysqli->prepare(sprintf(
    'select %s from %s where name = ? and password = ?',
    id,
    users
));
$statement->bind_param('ss', $name, $password);
$statement->execute();
$result = $statement->get_result()->num_rows === 1;
$mysqli->close();

if ($result) {
    setcookie(cookie, strval(rand(0, 9)));
    header('Location: ' . '../dynamic/admin.php');
} else {
    header('Location: ' . '../static/signin.html?e=1');
}
