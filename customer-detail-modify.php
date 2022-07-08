<?php
if(!isset($_POST["name"])){
    echo"沒有帶資料";
    exit;
}
require("db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$birthday=$_POST["birthday"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$address=$_POST["address"];
$image=$_POST["image"];
if ($_POST["image"] !== ''){
    $image = $_POST["image"]; 
}else{
    $image = $_POST["image_original"]; 
}
print $_POST["image"];
// echo "$name,$email,$phone,$birthday,$address,$image";
exit;
// if($_POST["img"] == ""){
//     $sql="UPDATE customer_users SET name='$name',phone='$phone',birthday='$birthday',email='$email',address='$address' WHERE id=$id";
// }else{
//     $sql="UPDATE customer_users SET name='$name',phone='$phone',birthday='$birthday',email='$email',address='$address',img='$img' WHERE id=$id";
// }

$sql="UPDATE customer_users SET name='$name',phone='$phone',birthday='$birthday',email='$email',address='$address' WHERE id=$id";



if ($conn->query($sql) === TRUE) {
    echo "資料表users修改完成";
} else {
    echo "資料表修改錯誤: " . $conn->error;
}
        
header("location: recipe-index.php");
?>
