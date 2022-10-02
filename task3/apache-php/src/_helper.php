<?php
const
host = 'mysql',
users = 'users',
name = 'name',
dbUser = 'user',
password = 'password',
db = 'appDB',
toys = 'toys',
id = 'ID',
title = 'title',
description = 'description',
cost = 'cost';
/*
function conv($string) {
    return iconv('ISO-8859-1', 'UTF-8', $string);
}
*/

function openMysqli(): mysqli {
    $connection = new mysqli(host, dbUser, password, db);
    return $connection;
}
?>