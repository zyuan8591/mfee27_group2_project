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
$condition=0;

if($userCount > 0){
    $row = $result->fetch_assoc();
    $user=[
        "id"=>$row["id"],
        "name"=>$row["name"],
        "email"=>$row["email"],
        "image"=>$row["logo_img"]
    ];
    unset($_SESSION["error"]["errorCondition"]);
    $_SESSION["user"]=$user;
    $condition=2;
    if($_SESSION["user"]["id"] == 0 ){
        header("location: admin-user-index.php");
    } else {
        header("location: company-user-index.php");
    }
    
} else {
    echo "帳號或密碼錯誤";
    $condition=1;
    $_SESSION["error"]["message"]="帳號或密碼錯誤";

    if(!isset($_SESSION["error"]["times"])){
        $_SESSION["error"]["times"]=1;
    } else {
        $_SESSION["error"]["times"]++ ;
    }
    header("location: login.php");    
}

//帳號密碼錯誤
if($condition == 1){ 
    $_SESSION["errorCondition"] =[
        "condition" => $condition
    ];
} 

//登入成功
if($condition == 2){
    $_SESSION["loginCondition"] =[
        "condition" => $condition
    ];
} 


$conn->close();
?>