<?php
require("./db-connect.php");
$search = isset($_GET["search"]) ? $_GET["search"] : "";

$sql="SELECT * FROM coupon WHERE name = '$search'";

$result = $conn->query($sql);
$couponCount=$result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);
//----------------------------------------------

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        
        <div class="py-2"><form action="search.php" method="get">
            <div class="input-group">
            <input type="text" class="form-control" name="search">
            <button class="btn btn-info">搜尋</button>
            </div>
            </form>
        </div>

    
        <?php if($couponCount>0):?>
            <table class="table table-bordered">
		<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">優惠券編號</th>
			<th scope="col">名稱</th>
			<th scope="col">序號</th>
			<th scope="col">起始日期</th>
			<th scope="col">結束日期</th>
			<th scope="col">優惠折扣</th>
			<th scope="col">編輯優惠券</th>
		</tr>
		</thead>
		<tbody>
        <?php foreach($rows as $row):?>
            <tr>
			<th class="text-center" scope="row"><?=$row["id"]?></th>
			<td><?=$row["name"]?></td>
			<td><?=$row["number"]?></td>
			<td><?=$row["start_date"]?></td>
			<td><?=$row["end_date"]?></td>
			<td><?=$row["discount"]?></td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">
				<a class="btn-main transition me-3 on-shelf " href="">上架</a>
				<a class="btn-main transition me-3 off-shelf" href="">下架</a>
				<a class="btn-main transition me-3 coupon-detail" href="">詳細資料</a>
				<?php require "coupon-detail.php"; ?>					
			</td>
		</tr>
        <?php endforeach;?>
        </tbody>
        </table>
        <?php else: ?>
            沒有符合條件
        <?php endif;?>
    </div>
  </body>
</html>