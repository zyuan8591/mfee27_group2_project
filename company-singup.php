<!doctype html>
<html lang="en">
  <head>
    <title>Company Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
      .panel{
        width: 350px;
      }
    </style>
  </head>
  <body>
     <div class="container ">
      <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="panel">
          <h2 class="text-center">商家後台註冊</h2>
          <form action="" method="post">
          <div class="mb-2 ">
              <label for="" >公司名稱</label>
              <input type="text" name="name" class="form-control" >
            </div>
            <div class="mb-2">
              <label for="" >帳號(信箱)</label>
              <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-2">
              <label for="" >密碼</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-2">
              <label for="">再次確認密碼</label>
              <input type="text" name="repassword" class="form-control">
            </div>
            <div class="mb-2">
              <label for="" >電話</label>
              <input type="text" name="phone" class="form-control">
            </div>
            <div class="mb-3">
              <label for="">地址</label>
              <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-2 text-center">
              <button type="submit" class="btn btn-info form-control">註冊</button>
            </div>
          </form>
        </div>
      </div>
     </div>
  
  </body>
</html>