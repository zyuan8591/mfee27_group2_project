
<?php
require("./db-connect.php");
if(!isset($_POST["name"])){
    echo "未輸入欄位";
    exit;
}
$id=$_POST["id"];
$name=$_POST["name"];
$number=$_POST["number"];
$startDate=$_POST["startDate"];
$endDate=$_POST["endDate"];
$percentDiscount=$_POST["percentDiscount"];
$undercharged=$_POST["undercharged"];
// echo "$number,$startDate,$endDate,$discount";

if($percentDiscount=="" || $percentDiscount==0 || $percentDiscount==null){
    $discount=-$undercharged;

}else{
    $discount= (100-$percentDiscount)/100;
};

if($endDate<$startDate){
    echo "結束日期不得小於開始日期";
    exit;
}else{
$sqlUpadate= "UPDATE coupon SET name='$name',number='$number',start_date='$startDate',end_date='$endDate',discount='$discount' WHERE id='$id'";

if($conn->query($sqlUpadate)){
    echo "資料更新成功 <br>";   
} else {
    echo "error: " . $conn->error;    
}
$conn->close();}




header("location: coupon-index.php");


?>

