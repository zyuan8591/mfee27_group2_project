<?php
require("db-connect.php");

if(!isset($_POST["signup-name"])){
    echo "請循正常管道登入";
    exit;
}

$signupName = $_POST["signup-name"];
$signupEmail = $_POST["signup-email"];
$signupPassword = $_POST["signup-password"];
$signupRePassword = $_POST["signup-repassword"];
$signupPhone = $_POST["signup-phone"];
$signupAddress = $_POST["signup-address"];

echo "$signupName, $signupEmail";

?>