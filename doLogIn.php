<?php
session_start();

require("db-connect.php");


if(!isset($_POST["login-email"])){
    echo "請循正常管道登入";
    exit;
}

$loginEmail = $_POST["login-email"];
$loginPassword = $_POST["login-password"];
$loginPassword=md5($loginPassword);

// echo "$loginEmail, $loginPassword";

$sql = "SELECT * FROM company_users WHERE email='$loginEmail' AND password='$loginPassword'";

$result = $conn->query($sql);
$userCount = $result->num_rows;
// echo $userCount;

if($userCount > 0){
    $row = $result->fetch_assoc();
    $user=[
        "id"=>$row["id"],
        "name"=>$row["name"],
        "email"=>$row["email"],
        "image"=>$row["logo_img"]
    ];
    unset($_SESSION["error"]);
    $_SESSION["user"]=$user;
    header("location: company-user-index.php");

} else {
    echo "帳號或密碼錯誤";
    $_SESSION["error"]["message"]="帳號或密碼錯誤";

    if(!isset($_SESSION["error"]["times"])){
        $_SESSION["error"]["times"]=1;
    } else {
        $_SESSION["error"]["times"]++ ;
    }
    header("location: login.php");    
}
?>