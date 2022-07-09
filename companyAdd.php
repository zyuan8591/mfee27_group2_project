<?php
if(!isset($_POST["name"])){
    echo "沒有帶資料"; 
    exit;
}

require("db-connect.php");

// $id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$intro=$_POST["intro"];
$now=date('Y-m-d H:i:s');

// var_dump($_FILES["add-company-file"]);

if(empty($name)){
    echo "請輸入名稱";
    exit;
}
if(empty($email)){
    echo "請輸入email";
    exit; 
}
if(empty($password)){
    echo "請輸入密碼";
    exit; 
}
if(empty($phone)){
    echo "請輸入電話";
    exit; 
}
if(empty($address)){
    echo "請輸入地址";
    exit; 
}
if(empty($intro)){
    echo "請輸入簡介內容";
    exit;
}

$password=md5($password);
$sql="SELECT email FROM company_users WHERE email='$email'";
$result = $conn->query($sql);
$userCount=$result->num_rows;

if($userCount>0){
    echo "廠商帳號已存在";
    exit;
}


if($_FILES["add-company-file"]["error"]==0){

    if(move_uploaded_file($_FILES["add-company-file"]["tmp_name"],"./company_img/".$_FILES["add-company-file"]["name"])){
        
        $fileName=$_FILES["add-company-file"]["name"];

        $sql="INSERT INTO company_users (name, email, password, phone, address, create_time, logo_img, intro, valid) VALUES ('$name', '$email', '$password', '$phone', '$address', '$now', '$fileName', '$intro', 1)";
        

        if ($conn->query($sql) === TRUE) {
            echo "資料新增成功";
        } else {
            echo "資料新增失敗: " . $conn->error;
        }
        echo "upload success!";
        // header("location: company-member-all-index.php");
    }else{
        echo "upload fail!!";
    }
}

$conn->close();




?>