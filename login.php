<?php
session_start();
if(isset($_SESSION["user"])){
	if($_SESSION["user"]["admin"] == 1 ){
        header("location: admin-user-index.php");
    } else {
        header("location: company-user-index.php");
    }
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
    <link rel="stylesheet" href="style/style.css">
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
        	--header-bg: #fff;
        	/* color */
        	--main-font-color: rgb(60, 60, 60);
            --font-color: rgb(250, 250, 250);
            --btn-color: #535353;
            --header-bg: #535353;
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
            color: var(--font-color);
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
        /* .main-contain {
            height: 110vh;
        } */
        .main{
            width: 100%;
            height: calc(100vh - var(--header-height));
            left: 0;
            background: var(--main-bg);
	        opacity: 0.8;
            /* background: url(login_img/background.jpeg) no-repeat center center; */
            /* background-size:100% 100% ; */
            display: flex;
            align-items: center;
            justify-content: center;  
            position: relative;
            top: var(--header-height);
        }
        
        .contain{
            background: #ffffff;
            width: 400px;
            /* max-height: 400px; */
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
            padding: 0.5rem;
            background: var(--btn-color);
            color: var(--font-color);
            width: 340px;
            border-radius: 5px;
        }
        .form-control{
            margin-top: 10px;
        }
        .f-password{
            font-size: 0.8rem;
            color: #cfa48c;
        }
        .log-in-contain{
            /* height: 27rem; */
            overflow: auto;
        }
        .log-in-title{
            background: var(--btn-color);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: -30px;
            margin-right: -30px;
            margin-top: -30px;
            padding: 0.5rem 30px;

        }
        .title,.titles{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: var(--font-color);
        }
        
        .error-times{
            width: 40%;
            background: #ffffffcc;
            border-radius: 5px;
            box-shadow: var(--box-shadow);  
            padding: 20px 0px;
        }
    </style>
    
</head>
<body>
    <!---------------------- header ---------------------->
<header class="header position-rel">
	<div class="flex_center">
		<div class="logo">
			<svg width="60" height="54" viewBox="0 0 60 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M55.7137 35.5169C55.5641 35.6558 55.4419 35.8196 55.353 36.0001L54.9001 36.6547C54.3619 37.429 53.7096 38.1247 52.9633 38.7202L52.2804 38.0664C52.1472 37.939 51.9667 37.8674 51.7784 37.8674C51.5902 37.8674 51.4096 37.939 51.2765 38.0664L42.4022 46.5625C42.2691 46.6899 42.1943 46.8628 42.1943 47.043C42.1943 47.2233 42.2691 47.3961 42.4022 47.5236L43.0851 48.1774C42.4631 48.8919 41.7364 49.5164 40.9276 50.0316L40.2468 50.4639C40.0569 50.5489 39.8849 50.6664 39.7391 50.8105C39.3807 51.1653 39.1823 51.6407 39.1866 52.1342C39.1909 52.6277 39.3976 53.0999 39.7621 53.4489C40.1266 53.7979 40.6198 53.9957 41.1353 53.9998C41.6508 54.004 42.1473 53.814 42.5179 53.4708C42.6675 53.3319 42.7897 53.1681 42.8785 52.9876L43.3315 52.333C43.8696 51.5587 44.522 50.863 45.2682 50.2675L45.9512 50.9213C46.0843 51.0487 46.2649 51.1203 46.4531 51.1203C46.6414 51.1203 46.8219 51.0487 46.9551 50.9213L55.8294 42.4252C55.9625 42.2978 56.0373 42.1249 56.0373 41.9447C56.0373 41.7644 55.9625 41.5916 55.8294 41.4641L55.1464 40.8103C55.7685 40.0958 56.4952 39.4713 57.304 38.9561L57.9848 38.5238C58.1746 38.4388 58.3467 38.3213 58.4924 38.1772C58.8508 37.8224 59.0493 37.347 59.045 36.8535C59.0407 36.36 58.834 35.8878 58.4695 35.5388C58.1049 35.1898 57.6118 34.992 57.0963 34.9879C56.5808 34.9837 56.0842 35.1737 55.7137 35.5169V35.5169ZM42.148 51.5827L41.6659 52.2787C41.6341 52.3236 41.6079 52.372 41.5878 52.4228C41.5694 52.4552 41.5454 52.4843 41.5169 52.5091C41.4141 52.6046 41.2762 52.6576 41.133 52.6566C40.9898 52.6556 40.8527 52.6007 40.7514 52.5037C40.6502 52.4068 40.5928 52.2755 40.5918 52.1384C40.5907 52.0013 40.6461 51.8693 40.7459 51.7709C40.7717 51.7436 40.8022 51.7206 40.836 51.703C40.8945 51.6792 40.9506 51.6503 41.0036 51.6166L41.7135 51.1667C42.6031 50.6033 43.4064 49.9241 44.1004 49.1487L44.2573 49.2989C43.4469 49.9628 42.737 50.7314 42.148 51.5827V51.5827ZM46.4538 49.4797L45.8198 48.8727L44.5419 47.6493L43.908 47.0423L44.2352 46.729L46.7811 49.1664L46.4538 49.4797ZM47.785 48.2053L45.2391 45.7679L50.4473 40.7817L52.9932 43.2191L47.785 48.2053ZM53.997 42.258L51.4512 39.8206L51.7784 39.5073L52.4124 40.1143L53.6903 41.3377L54.3243 41.9447L53.997 42.258ZM57.4886 37.2161C57.4627 37.2434 57.4322 37.2664 57.3984 37.2841C57.3399 37.3078 57.2838 37.3367 57.2308 37.3704L56.5209 37.8203C55.6313 38.3837 54.828 39.0629 54.1341 39.8383L53.9772 39.6881C54.7868 39.0241 55.4959 38.2555 56.0843 37.4044L56.5663 36.7084C56.5982 36.6634 56.6244 36.6151 56.6444 36.5643C56.6628 36.5319 56.6869 36.5027 56.7154 36.4779C56.8182 36.3824 56.9561 36.3294 57.0993 36.3304C57.2425 36.3314 57.3796 36.3863 57.4808 36.4833C57.5821 36.5803 57.6395 36.7115 57.6405 36.8486C57.6416 36.9857 57.5862 37.1177 57.4864 37.2161H57.4886Z" fill="#E5DF96"/>
                <path d="M3.50046 41.4276C3.37038 41.2947 3.2984 41.1169 3.30002 40.9322C3.30165 40.7476 3.37675 40.5709 3.50916 40.4404C3.64156 40.3098 3.82068 40.2357 4.00792 40.2341C4.19516 40.2325 4.37555 40.3035 4.51024 40.4318L6.5305 42.424C6.66059 42.5569 6.73257 42.7347 6.73094 42.9194C6.72931 43.104 6.65421 43.2807 6.5218 43.4112C6.3894 43.5418 6.21029 43.6159 6.02304 43.6175C5.8358 43.6191 5.65541 43.5481 5.52073 43.4198L3.50046 41.4276ZM8.55005 41.4276C8.68393 41.2955 8.75914 41.1164 8.75914 40.9297C8.75914 40.7429 8.68393 40.5639 8.55005 40.4318L6.52979 38.4402C6.46391 38.373 6.38511 38.3193 6.29799 38.2824C6.21086 38.2455 6.11715 38.2261 6.02233 38.2253C5.92751 38.2245 5.83347 38.2423 5.74571 38.2777C5.65795 38.3131 5.57821 38.3654 5.51116 38.4315C5.44411 38.4976 5.39108 38.5763 5.35518 38.6628C5.31927 38.7494 5.3012 38.8421 5.30202 38.9356C5.30285 39.0291 5.32255 39.1215 5.35997 39.2074C5.3974 39.2933 5.45181 39.3711 5.52001 39.436L7.53956 41.4276C7.67348 41.5596 7.85509 41.6338 8.04445 41.6338C8.23381 41.6338 8.41542 41.5596 8.54934 41.4276H8.55005ZM0.347589 40.5536L5.64356 35.3304C5.76286 35.2134 5.9059 35.1226 6.06329 35.0639C6.22068 35.0052 6.38887 34.98 6.55684 34.9899C6.7248 34.9998 6.88875 35.0446 7.03792 35.1214C7.1871 35.1981 7.31813 35.3051 7.42245 35.4353L10.6217 39.4445C10.9813 39.8965 11.1607 40.4627 11.1261 41.0363C11.0915 41.6098 10.8453 42.151 10.4339 42.5578L10.3197 42.6705L17.0846 48.9142C17.2909 49.1035 17.4562 49.3323 17.5702 49.5865C17.6842 49.8407 17.7447 50.1151 17.748 50.393C17.7513 50.9508 17.5308 51.4872 17.1346 51.8853C16.9359 52.0814 16.6992 52.236 16.4386 52.34C16.178 52.4439 15.8989 52.4951 15.6179 52.4905C15.3368 52.4859 15.0596 52.4256 14.8027 52.3132C14.5457 52.2007 14.3144 52.0384 14.1224 51.836L7.79165 45.1649L7.6781 45.2769C7.26571 45.6833 6.7166 45.9267 6.13459 45.9609C5.55258 45.9952 4.97801 45.818 4.51952 45.4628L0.45328 42.3078C0.320667 42.2046 0.211703 42.0749 0.133548 41.9272C0.0553926 41.7795 0.00981539 41.6171 -0.000190394 41.4508V41.3804C0.000624353 41.0703 0.125625 40.7732 0.347589 40.5536V40.5536ZM9.30846 43.6677L8.80071 44.1684L15.1643 50.8733C15.2255 50.9378 15.2992 50.9895 15.3811 51.0253C15.463 51.0611 15.5513 51.0803 15.6409 51.0817C15.7304 51.0832 15.8193 51.0669 15.9024 51.0337C15.9854 51.0006 16.0608 50.9513 16.1241 50.8888C16.1895 50.8279 16.2407 50.7537 16.2744 50.6714C16.308 50.5892 16.3233 50.5007 16.319 50.4121C16.3174 50.3234 16.2976 50.2361 16.2608 50.1552C16.224 50.0744 16.1709 50.0017 16.1048 49.9416L9.30846 43.6677ZM6.46552 36.5107L1.54447 41.3649L5.40075 44.355C5.58451 44.4974 5.81477 44.5685 6.04805 44.5549C6.28133 44.5412 6.50147 44.4438 6.6669 44.2811L7.30176 43.6543L8.78643 42.1902L9.42129 41.5642C9.58624 41.4013 9.68495 41.1844 9.69877 40.9546C9.71258 40.7248 9.64055 40.498 9.49627 40.317L6.46552 36.5107Z" fill="#E5DF96"/>
                <path d="M17.3112 16.4951L18.4625 26.8607C18.5046 27.2374 18.8227 27.5225 19.202 27.5225H37.7983C38.1775 27.5225 38.4956 27.2374 38.5377 26.8607L39.689 16.4951C41.7179 15.4966 43.0051 13.4482 43.0051 11.1578C43.0051 7.87654 40.3355 5.20707 37.0544 5.20707C36.8714 5.20707 36.6882 5.21532 36.506 5.23223C35.2995 2.12148 32.2486 0 28.8721 0C25.4295 0 22.3735 2.16074 21.1974 5.33873C20.7886 5.25116 20.37 5.20687 19.9459 5.20687C16.6646 5.20687 13.9951 7.87654 13.9951 11.1576C13.9951 13.4482 15.2823 15.4966 17.3112 16.4951ZM19.9459 6.6946C20.4588 6.6946 20.9613 6.78036 21.438 6.94987C21.6335 7.01973 21.8499 7.00423 22.0329 6.90739C22.2167 6.81117 22.3518 6.64226 22.4055 6.44175C23.1887 3.52486 25.8481 1.48773 28.8721 1.48773C31.8125 1.48773 34.4518 3.4542 35.2898 6.26942C35.3996 6.63964 35.7744 6.86431 36.1521 6.7858C36.447 6.72561 36.7506 6.6946 37.0544 6.6946C39.5155 6.6946 41.5174 8.6965 41.5174 11.1576C41.5174 12.99 40.419 14.616 38.7193 15.2999C38.465 15.4024 38.2879 15.6359 38.2573 15.9079L37.1321 26.0345H19.8681L18.743 15.9081C18.7126 15.6361 18.5352 15.4026 18.281 15.3001C16.5812 14.6162 15.4829 12.9902 15.4829 11.1578C15.4829 8.6967 17.4847 6.6946 19.9459 6.6946Z" fill="#E5DF96"/>
                <path d="M18.4582 11.9017C18.8693 11.9017 19.2021 11.5685 19.2021 11.1578C19.2021 10.3375 19.8697 9.67011 20.6898 9.67011C21.1009 9.67011 21.4337 9.33693 21.4337 8.92624C21.4337 8.51555 21.1009 8.18237 20.6898 8.18237C19.0489 8.18237 17.7144 9.51711 17.7144 11.1578C17.7144 11.5685 18.0469 11.9017 18.4582 11.9017Z" fill="#E5DF96"/>
                <path d="M25.8967 7.43857C26.3078 7.43857 26.6406 7.10539 26.6406 6.69471C26.6406 5.87434 27.3081 5.20697 28.1283 5.20697C28.5394 5.20697 28.8722 4.87379 28.8722 4.46311C28.8722 4.05242 28.5394 3.71924 28.1283 3.71924C26.4874 3.71924 25.1528 5.05397 25.1528 6.69471C25.1528 7.1056 25.4856 7.43857 25.8967 7.43857Z" fill="#E5DF96"/>
                <path d="M34.0788 11.9017C34.4899 11.9017 34.8227 11.5685 34.8227 11.1578C34.8227 10.3375 35.4903 9.67011 36.3104 9.67011C36.7215 9.67011 37.0543 9.33693 37.0543 8.92624C37.0543 8.51555 36.7215 8.18237 36.3104 8.18237C34.6695 8.18237 33.335 9.51711 33.335 11.1578C33.335 11.5685 33.6677 11.9017 34.0788 11.9017Z" fill="#E5DF96"/>
                <path d="M22.9219 31.6137C22.9219 32.639 23.7557 33.4733 24.7814 33.4733C25.8072 33.4733 26.641 32.639 26.641 31.6137C26.641 30.5884 25.8072 29.7542 24.7814 29.7542C23.7557 29.7542 22.9219 30.5884 22.9219 31.6137ZM25.1535 31.6137C25.1535 31.8189 24.9864 31.9856 24.7816 31.9856C24.5767 31.9856 24.4098 31.8189 24.4098 31.6137C24.4098 31.4086 24.5769 31.2419 24.7816 31.2419C24.9864 31.2417 25.1535 31.4084 25.1535 31.6137Z" fill="#E5DF96"/>
                <path d="M30.3594 31.6137C30.3594 32.639 31.1932 33.4733 32.2189 33.4733C33.2447 33.4733 34.0785 32.639 34.0785 31.6137C34.0785 30.5884 33.2447 29.7542 32.2189 29.7542C31.1932 29.7542 30.3594 30.5884 30.3594 31.6137ZM32.591 31.6137C32.591 31.8189 32.4239 31.9856 32.2191 31.9856C32.0144 31.9856 31.8473 31.8189 31.8473 31.6137C31.8473 31.4086 32.0144 31.2419 32.2191 31.2419C32.4239 31.2419 32.591 31.4084 32.591 31.6137Z" fill="#E5DF96"/>
                <path d="M43.1642 36.3387C42.8983 36.1259 42.5212 36.121 42.2511 36.327C41.1346 37.1725 38.9102 37.8103 37.076 37.8103C34.7478 37.8103 32.9651 36.9766 31.6249 35.2624C31.484 35.0819 31.2676 34.9766 31.0387 34.9766H25.9248C25.6959 34.9766 25.4795 35.0819 25.3386 35.262C23.9606 37.0244 22.3138 37.8103 19.9987 37.8103C18.397 37.8103 16.8199 37.2833 15.5574 36.327C15.2864 36.1215 14.9094 36.1261 14.6442 36.3387C14.3783 36.5511 14.2905 36.9173 14.4314 37.2275C15.768 40.172 18.7696 43.143 22.4634 43.143C24.5003 43.143 26.7746 42.9026 28.5224 41.251C30.3741 42.9326 33.0503 43.143 34.9817 43.143C38.6908 43.143 42.0751 40.0949 43.3768 37.2275C43.5179 36.9173 43.43 36.5513 43.1642 36.3387ZM34.9817 41.6553C32.0535 41.6553 30.1823 41.0328 29.092 39.696C28.951 39.5231 28.7397 39.4225 28.516 39.4225C28.2923 39.4225 28.0807 39.5231 27.94 39.696C26.8046 41.0875 25.2182 41.6553 22.4636 41.6553C20.3854 41.6553 18.5234 40.4139 17.2066 38.8465C18.1023 39.1428 19.0472 39.2978 19.9989 39.2978C22.6118 39.2978 24.6696 38.3702 26.2787 36.4641H30.686C32.2818 38.3448 34.4307 39.2978 37.0762 39.2978C38.0924 39.2978 39.3899 39.1177 40.6182 38.7378C39.1784 40.3692 37.0883 41.6553 34.9817 41.6553Z" fill="#E5DF96"/>
            </svg>

		</div>
		<h1 class="title">廚聚</h1>
	</div>
</header>
<!---------------------- main ---------------------->
<main class="main">
    <div class="main-contain d-flex justify-content-center align-items-center">
    <?php if(isset($_SESSION["error"]) && $_SESSION["error"]["times"]>=3): ?>
        <div class="error-times text-center">
        <h3 class="text-danger">帳號密碼輸入錯誤已超過3次<br>請稍候再登入</h3>
        </div>
    <?php else: ?>
        <div id="openMsg">
            <div class="contain log-in-contain m-0">
                <div class="log-in-title">
                    <h2 class="text-center titles">Sign in</h2>
                    <h2 class="text-center d-none titles">Join now</h2>
                </div>
                <!-- <div>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div> -->
                <div class="tabs mt-4">
                    <a id="d1" class="a1 b-bottom" href="#">登入</a>
                    <a id="d2" class="a1 ms-3 " href="#">註冊</a>
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
                        <button class="btn-style border-0" type="submit">登入</button>    
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
                        <button class="btn-style rounded-0 border-0" type="submit">註冊</button>    
                    </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</main>
<script>

    let p1=document.getElementsByClassName("p1");
    let a1=document.getElementsByClassName("a1");
    let titles = document.querySelectorAll('.titles');
    console.log(titles);
    p1Idx=0;
    p1[p1Idx].style.display="flex";

    for(let i=0; i<a1.length; i++){        
        a1[i].addEventListener("click",function(){
            for(let s=0; s<a1.length; s++){ 
                a1[s].classList.remove("b-bottom");
                p1[s].style.display="none";
                titles[s].classList.add('d-none');
            }
            a1[i].classList.add("b-bottom");
            p1[i].style.display="flex";
            titles[i].classList.remove('d-none');
        });
    }

    // function menuClick(){
    //    for(let s=0; s<a1.length; s++){ 
    //       a1[s].classList.remove("b-bottom");
    //       p1[s].style.display="none";
    // }
    //       this.classList.add("b-bottom");
    //       p1Idx=Number(this.id.substr(1));
    //       p1[p1Idx-1].style.display="flex";
    // }

</script>
  </body>
</html>