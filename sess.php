<?php

session_start();

$_SESSION["user"]=[
    "admin" =>1,
    "id" => 1
];

var_dump($_SESSION);

?>