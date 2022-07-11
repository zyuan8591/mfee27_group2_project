<?php
session_start();
if(isset($_SESSION["user"])){
	header("location:admin-user-index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>廚聚後台登入系統</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;400;700&display=swap"
		rel="stylesheet"
	/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="./style/normalize.css" />

    <style>

        * {
	        box-sizing: border-box;
	        margin: 0;
	        padding: 0;
        }

        body,
        *::placeholder,
        *,
        select,
        option,
        input {
        	font-family: "Noto Sans TC", sans-serif;
        }

        a,
        a:link {
        	text-decoration: none;
        	color: black;
        }
        a:hover,
        a:active {
        	color: black;
        }

        :root {
        	/* height &width */
        	--header-height: 80px;
        	/* bg-color */
        	--header-bg: rgb(180, 206, 236);
        	/* color */
        	--main-font-color: rgb(60, 60, 60);
            --btn-color: rgb(180, 206, 236);
        	/* other */
        	--box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15), 0 0px 2px rgba(0, 0, 0, 0.1);
        	--hover-shadow: 3px 2px #bbb;
        	--outline: var(--button-active) solid 4px;
        	--input-border: #ced4da;
        }
    /* header */
        .header {
    	    background: var(--header-bg);
    	    padding: 0.5rem 1rem;
    	    height: var(--header-height);
    	    box-shadow: var(--box-shadow);
    	    width: 100%;
    	    /* position: fixed; */
    	    /* z-index: 50; */
           
        }
    /* logo& title */
        .logo {
    	    margin-right: 1rem;
        }
        .logo-name{
            color: var(--main-font-color);
        }
    /* ------------- */
        .main-contain {
            height: 110vh;
        }
        .main{
            width: 100%;
            /* background: url(login_img/background.jpeg) no-repeat center center; */
            /* background-size:100% 100% ; */
            display: flex;
            align-items: center;
            justify-content: center;  
                  
        }
        .contain{
            background: #ffffffcc;
            width: 400px;
            margin: auto 30px;
            padding:30px;
            border-radius: 5px;
            box-shadow: var(--box-shadow);            
        }
    /* ---  a 登入&廠商--- */
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
    /* -------------- */
        .btn-style{
            padding: 6px;
            background: var(--btn-color);
            color: white;
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
        .log-in-contain h2{
            background: var(--btn-color);
            margin: -30px -30px 0px;
            padding: 16px 0px 0px;
        } 
        .error-times{
            width: 40%;
            background: #ffffffcc;
            border-radius: 5px;
            box-shadow: var(--box-shadow);  
            padding: 20px 0px;
        }
    </style>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <!---------------------- header ---------------------->
<header class="header position-rel">
	<div class="flex_center">
		<div class="logo">
			<svg
				width="50"
				height="50"
				viewBox="0 0 50 50"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M44.082 36.0694C45.7812 34.7924 46.875 32.7842 46.875 30.503C46.875 26.628 43.7256 23.4841 39.8438 23.4841H38.4648C39.7754 22.3338 40.625 20.6765 40.625 18.7171C40.625 15.2808 37.8174 12.5658 34.375 12.5658H33.8013C34.1602 11.5812 34.375 10.5381 34.375 9.35855C34.375 4.19185 30.1758 0 25 0C24.4873 0 23.999 0.0731137 23.5234 0.146227C24.4434 1.51297 25 3.07272 25 4.67927C25 8.99298 21.5088 12.4781 17.1875 12.4781H15.625C12.1826 12.4781 9.375 15.2808 9.375 18.6294C9.375 20.5059 10.2295 22.1632 11.5352 23.3086H10.1562C6.27441 23.3964 3.125 26.6329 3.125 30.503C3.125 32.7822 4.22363 34.7924 5.91992 36.0723C2.56348 36.6056 0 39.4814 0 42.9811C0 46.861 3.14941 50 7.03125 50H42.9688C46.8506 50 50 46.8561 50 42.9811C50 39.4814 47.4414 36.6056 44.082 36.0694ZM18.75 25.0439C20.4834 25.0439 21.875 26.433 21.875 28.1634C21.875 29.8937 20.4834 31.2829 18.75 31.2829C17.0166 31.2829 15.625 29.8986 15.625 28.1634C15.625 26.4282 17.0215 25.0439 18.75 25.0439ZM34.3262 38.5943C33.2129 41.3141 28.5254 43.761 25 43.761C21.3877 43.761 16.7012 41.3121 15.6758 38.5943C15.4785 38.0873 15.8691 37.5219 16.4355 37.5219H33.5742C34.1309 37.5219 34.5215 38.0873 34.3262 38.5943ZM31.25 31.2829C29.5166 31.2829 28.125 29.8937 28.125 28.1634C28.125 26.433 29.5166 25.0439 31.25 25.0439C32.9834 25.0439 34.375 26.433 34.375 28.1634C34.375 29.8937 32.9883 31.2829 31.25 31.2829Z"
					fill="#CEA470"
				/>
			</svg>
		</div>
		<h1 class="title">廚聚</h1>
	</div>
</header>
<!---------------------- main ---------------------->
<div class="main-contain d-flex justify-content-center align-items-center">
<?php if(isset($_SESSION["error"]) && $_SESSION["error"]["times"]>=3): ?>
    <div class="error-times text-center">
    <h3 class="text-danger">帳號密碼輸入錯誤已超過3次<br>請稍候再登入</h3>
    </div>
<?php else: ?>
    <div class="main" id="openMsg">
        <div class="contain log-in-contain m-0">
            <div class="log-in-title">
                <h2 class="text-center pb-3">LOG IN</h2>
            </div>
            <!-- <div>
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div> -->
            <div class="tabs mt-4">
                <a id="d1" class="a1 b-bottom" href="#">登入</a>
                <a id="d2" class="a1 ms-3 " href="#">廠商</a>
            </div>
<!--- 登入 ---->
            <div class="p1">
            <form action="doLogIn.php" method="post">
                <div class="my-3">
                    <label for="">電子信箱</label>
                    <input type="email" class="form-control" name="login-email">
                </div>
                <div class="mb-2">
                    <label for="">密碼</label>
                    <input type="password" class="form-control" name="login-password">
                </div>
                <?php if(isset($_SESSION["error"])): ?>
                <div class="mb-2">
                    <?php if($_SESSION["errorCondition"]["condition"] == 1): ?><div class="text-danger"><?=$_SESSION["error"]["message"]?></div>
                    <?php endif; ?>
                </div> 
                <?php endif; ?>
                <div class="d-flex mt-4 justify-content-center">
                    <button class="btn-style rounded-0 border-0" type="submit">登入</button>    
                </div>
            </form>
            </div>
<!--- 廠商登入 --->
            <div class="p1 ">
            <form action="company-doSignUp.php" method="post" >
            <div class="my-3">
                    <label for="">公司名稱</label>
                    <input type="text" class="form-control" name="signup-name">
                </div>
                <div class="my-3">
                    <label for="">帳號(信箱)</label>
                    <input type="email" class="form-control" name="signup-email">
                </div>
                <div class="mb-2">
                    <label for="">密碼</label>
                    <input type="password" class="form-control" name="signup-password">
                </div>
                <div class="mb-3">
                    <label for="">再輸入一次密碼</label>
                    <input type="password" class="form-control" name="signup-repassword">
                </div>
                <div class="mb-3">
                    <label for="">電話</label>
                    <input type="tel" class="form-control" name="signup-phone">
                </div>
                <div class="mb-3">
                    <label for="">地址</label>
                    <input type="text" class="form-control" name="signup-address">
                </div>
                <div class="d-flex mt-4 justify-content-center">
                    <button class="btn-style rounded-0 border-0" type="submit">Sign Up</button>    
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php endif; ?>
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