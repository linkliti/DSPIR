<?php
# Meta
echo '
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

# JS
echo '<script> ';
require $_SERVER['DOCUMENT_ROOT'] . '/session/js_stuff.js';
echo ' </script>';

# CSS
echo '<style> ';
require $_SERVER['DOCUMENT_ROOT'] . '/css/table.css';
echo ' </style>';

# Theme
echo '<style> ';
# True = Dark
if (isset($_SESSION['theme']) && $_SESSION['theme']){
    require $_SERVER['DOCUMENT_ROOT'] . '/css/dark.css';
}
else {
    require $_SERVER['DOCUMENT_ROOT'] . '/css/light.css';
}
echo ' </style>';

# Site header
require $_SERVER['DOCUMENT_ROOT'] . '/session/header.php';
?>