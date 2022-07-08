<!doctype html>
<html lang="en">
  <head>
    <title>screen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        :root{
            --btn-color:#c79b83;
        }
/* header */
        .header{
            position: relative;
        }
        .wrap> .img-size{
            height: 8rem;
            width: 8rem;
            /* margin: 10px; */
            position: absolute;
            z-index: 10;
            top: 10%;
            left: 50%;
            transform:translate(-4rem) ;
        }





/* -------------- */
        .title{
            position: relative;
            height: 100vh;
        }
        /* .p-idx{
            position: absolute;
        } */
        .main{
            width: 100%;
            height: 100%;
            background: url(customer_img/background.jpeg) no-repeat center center;
            background-size:100% 100% ;
            display: flex;
            /* position: absolute;
            z-index: 1; */
            align-items: center;
            justify-content: center;
        }
        .close{
            position: absolute;
            /* left: -100%; */
        }

        .contain{
            background: #ffffffcc;
            width: 400px;
            margin: auto 30px;
            padding:30px;
            border-radius: 5px;
            border:1px solid  #cfa48c;
        }
        /* .btn-close{
            position: absolute;
            top: 5px;
            right: 5px;
        } */
/* ----- a ----- */
        .tabs {
            border-bottom: 2px solid #ddd;
            height: 32px;
        }
        .tabs> a{
            text-decoration: none;
            color: black;
            padding-bottom: 6px;  
        }
        .b-bottom{
            border-bottom: 4px solid var(--btn-color);
        }
        .contain >.p1{
          display: none;
        }
/* ------------------ */
        .btn-style{
            padding: 6px;
            background: var(--btn-color);
            color:white;
            width: 340px;
        }
        .form-control{
            margin-top: 10px;
        }
        .f-password{
            font-size: 0.8rem;
            color: #cfa48c;
        }

        .log-in-contain{
            height: 27rem;
            overflow: auto;
        }
        
    </style>
</head>
<body>
<div class="header">
    <div class="wrap text-center">
        <img class="img-size" src="customer_img/Logo.png" alt="">
    </div>
</div>    
    
<div class="title d-flex justify-content-center align-items-center ">
    
    <div class="main close " id="openMsg">
        <div class="contain position-relative log-in-contain">
            <h2 class="text-center pb-3">LOG IN</h2>
            <!-- <div>
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div> -->
            <div class="tabs">
                <a id="d1" class="a1 b-bottom" href="#">登入</a>
                <a id="d2" class="a1 ms-3 " href="#">廠商</a>
            </div>
<!-- 登入 -->
            <div class="p1">
            <form action="company-doLogIn.php" method="get">
                
                <div class="my-3">
                    <label for="">電子信箱</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-2">
                    <label for="">密碼</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="d-flex mt-4 justify-content-center">
                    <button class="btn-style rounded-0 border-0" type="submit">登入</button>    
                </div>
                
            </form>
            </div>
<!-- 廠商登入 -->
            <div class="p1 ">
            <form action="company-doSignUp.php" method="get" >
            <div class="my-3">
                    <label for="">公司名稱</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="my-3">
                    <label for="">帳號(信箱)</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-2">
                    <label for="">密碼</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="">再輸入一次密碼</label>
                    <input type="password" class="form-control" name="repassword">
                </div>
                <div class="mb-3">
                    <label for="">電話</label>
                    <input type="tel" class="form-control" name="phone">
                </div>
                <div class="mb-3">
                    <label for="">地址</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="d-flex mt-4 justify-content-center">
                    <button class="btn-style rounded-0 border-0" type="submit">log-in</button>    
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
    

<script>
let p1=document.getElementsByClassName("p1");
let a1=document.getElementsByClassName("a1");
p1Idx=0;
p1[p1Idx].style.display="flex";

for(let i=0; i<a1.length; i++){        
    a1[i].addEventListener("click",menuClick);
}

function menuClick(){
   for(let s=0; s<a1.length; s++){ 
      a1[s].classList.remove("b-bottom");
      p1[s].style.display="none";
}
      this.classList.add("b-bottom");
      p1Idx=Number(this.id.substr(1));
      p1[p1Idx-1].style.display="flex";
}

</script>
  </body>
</html>