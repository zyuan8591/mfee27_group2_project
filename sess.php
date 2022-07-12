<?php

session_start();

$_SESSION["user"]=[
    "admin" => 1,
    "id" => 10
];

var_dump($_SESSION);

?>