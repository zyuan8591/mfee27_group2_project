<?php
if(!isset($_POST["name"])){
    echo "沒有帶資料";
    exit;
}

require("db-connect.php");

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$intro = $_POST["intro"];

// var_dump($_FILES["myfile-image"]);

if($_FILES["myfile-image"]["error"]==0){

    if(move_uploaded_file($_FILES["myfile-image"]["tmp_name"],"./img/company_img/".$_FILES["myfile-image"]["name"])){
        
        $fileName=$_FILES["myfile-image"]["name"];

        $sql="UPDATE company_users SET name='$name', email='$email', phone='$phone', address='$address', logo_img='$fileName', intro='$intro' WHERE id='$id'";
        

        if ($conn->query($sql) === TRUE) {
            echo "資料表 users 修改完成";
        } else {
            echo "修改資料表錯誤: " . $conn->error;
        }
        echo "upload success!";
        // header("location: company-member-all-index.php");
    }else{
        echo "upload fail!!";
    }
}

// if(empty($fileName)){
//     $sql="UPDATE company_users SET name='$name', email='$email', phone='$phone', address='$address', intro='$intro' WHERE id='$id'";
// }else{
//     $sql="UPDATE company_users SET name='$name', email='$email', phone='$phone', address='$address', logo_img='$fileName', intro='$intro' WHERE id='$id'";
// }

$conn->close();

header("location: company-member-all-index.php");

?>
