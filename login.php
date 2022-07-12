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
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
        	--header-height: 50px;
        	/* bg-color */
        	--header-bg: #fff;
        	/* color */
        	--main-font-color: rgb(60, 60, 60);
            --font-color: rgb(250, 250, 250);
            --btn-color: #4c6791;
            --header-bg: #4c6791;
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
            <svg width="51" height="46" viewBox="0 0 51 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M47.4595 30.2551C47.3321 30.3735 47.228 30.513 47.1523 30.6668L46.7665 31.2244C46.308 31.884 45.7524 32.4766 45.1167 32.9839L44.5349 32.4269C44.4215 32.3184 44.2677 32.2574 44.1073 32.2574C43.9469 32.2574 43.7931 32.3184 43.6797 32.4269L36.1201 39.6644C36.0067 39.7729 35.943 39.9202 35.943 40.0737C35.943 40.2272 36.0067 40.3745 36.1201 40.4831L36.7019 41.04C36.172 41.6486 35.553 42.1806 34.864 42.6195L34.284 42.9878C34.1223 43.0602 33.9758 43.1603 33.8516 43.2831C33.5463 43.5853 33.3773 43.9902 33.3809 44.4106C33.3846 44.831 33.5606 45.2332 33.8712 45.5305C34.1817 45.8278 34.6018 45.9964 35.0409 45.9999C35.48 46.0034 35.903 45.8415 36.2187 45.5493C36.3461 45.4309 36.4502 45.2914 36.5259 45.1376L36.9117 44.58C37.3702 43.9204 37.9259 43.3277 38.5616 42.8205L39.1434 43.3774C39.2568 43.486 39.4106 43.547 39.5709 43.547C39.7313 43.547 39.8851 43.486 39.9985 43.3774L47.5581 36.14C47.6715 36.0314 47.7352 35.8842 47.7352 35.7307C47.7352 35.5771 47.6715 35.4299 47.5581 35.3213L46.9763 34.7643C47.5062 34.1557 48.1253 33.6237 48.8142 33.1848L49.3942 32.8166C49.5559 32.7442 49.7024 32.6441 49.8266 32.5213C50.1319 32.2191 50.301 31.8142 50.2973 31.3937C50.2937 30.9733 50.1176 30.5711 49.8071 30.2739C49.4965 29.9766 49.0764 29.808 48.6373 29.8045C48.1982 29.801 47.7752 29.9628 47.4595 30.2551V30.2551ZM35.9036 43.9408L35.493 44.5337C35.4658 44.572 35.4435 44.6132 35.4264 44.6564C35.4107 44.684 35.3903 44.7089 35.366 44.73C35.2784 44.8114 35.161 44.8565 35.039 44.8556C34.917 44.8548 34.8002 44.808 34.7139 44.7254C34.6277 44.6428 34.5788 44.531 34.5779 44.4142C34.577 44.2974 34.6242 44.185 34.7092 44.1012C34.7312 44.0779 34.7572 44.0583 34.786 44.0433C34.8358 44.0231 34.8836 43.9984 34.9287 43.9698L35.5335 43.5865C36.2912 43.1065 36.9756 42.528 37.5667 41.8674L37.7004 41.9954C37.0101 42.5609 36.4053 43.2157 35.9036 43.9408V43.9408ZM39.5715 42.1494L39.0315 41.6324L37.9429 40.5902L37.4028 40.0731L37.6816 39.8062L39.8503 41.8825L39.5715 42.1494ZM40.7055 41.0638L38.5368 38.9875L42.9734 34.74L45.1421 36.8163L40.7055 41.0638ZM45.9972 35.9976L43.8285 33.9213L44.1073 33.6544L44.6474 34.1714L45.736 35.2136L46.276 35.7307L45.9972 35.9976ZM48.9715 31.7026C48.9495 31.7259 48.9235 31.7455 48.8947 31.7605C48.8448 31.7807 48.797 31.8054 48.7519 31.834L48.1472 32.2173C47.3894 32.6973 46.7051 33.2758 46.1139 33.9364L45.9803 33.8084C46.6699 33.2428 47.274 32.588 47.7752 31.863L48.1859 31.2701C48.213 31.2318 48.2353 31.1906 48.2524 31.1474C48.2681 31.1198 48.2885 31.0949 48.3129 31.0738C48.4004 30.9924 48.5179 30.9473 48.6399 30.9482C48.7619 30.949 48.8786 30.9958 48.9649 31.0784C49.0512 31.161 49.1 31.2728 49.1009 31.3896C49.1018 31.5064 49.0547 31.6188 48.9697 31.7026H48.9715Z" fill="#E5DF96"/>
                <path d="M2.98182 35.2902C2.87101 35.177 2.8097 35.0255 2.81108 34.8682C2.81247 34.7109 2.87644 34.5605 2.98923 34.4492C3.10202 34.338 3.2546 34.2749 3.4141 34.2735C3.5736 34.2722 3.72727 34.3326 3.842 34.4419L5.56297 36.139C5.67378 36.2522 5.7351 36.4037 5.73371 36.561C5.73233 36.7183 5.66835 36.8687 5.55556 36.98C5.44277 37.0912 5.29019 37.1543 5.13069 37.1557C4.97119 37.157 4.81752 37.0966 4.70279 36.9873L2.98182 35.2902ZM7.28333 35.2902C7.39737 35.1777 7.46144 35.0251 7.46144 34.866C7.46144 34.707 7.39737 34.5544 7.28333 34.4419L5.56236 32.7454C5.50624 32.6881 5.43912 32.6424 5.3649 32.611C5.29068 32.5795 5.21086 32.563 5.13008 32.5623C5.04931 32.5616 4.9692 32.5768 4.89444 32.607C4.81968 32.6371 4.75176 32.6817 4.69464 32.738C4.63752 32.7943 4.59235 32.8613 4.56177 32.935C4.53118 33.0087 4.51579 33.0877 4.51649 33.1674C4.51719 33.247 4.53397 33.3258 4.56585 33.3989C4.59774 33.4721 4.64408 33.5383 4.70218 33.5937L6.42254 35.2902C6.53662 35.4026 6.69132 35.4658 6.85263 35.4658C7.01394 35.4658 7.16864 35.4026 7.28272 35.2902H7.28333ZM0.296045 34.5457L4.80742 30.0963C4.90905 29.9966 5.0309 29.9192 5.16497 29.8693C5.29905 29.8193 5.44232 29.7978 5.5854 29.8062C5.72848 29.8147 5.86814 29.8528 5.99521 29.9182C6.12229 29.9836 6.23392 30.0748 6.32277 30.1857L9.04809 33.6009C9.35439 33.986 9.50722 34.4683 9.47775 34.9568C9.44827 35.4454 9.23854 35.9064 8.8881 36.253L8.79077 36.349L14.5535 41.6677C14.7293 41.829 14.87 42.0238 14.9671 42.2404C15.0643 42.4569 15.1158 42.6907 15.1186 42.9274C15.1214 43.4026 14.9336 43.8595 14.5961 44.1986C14.4268 44.3656 14.2252 44.4973 14.0032 44.5859C13.7812 44.6745 13.5435 44.7181 13.3041 44.7142C13.0647 44.7103 12.8285 44.6589 12.6096 44.5631C12.3908 44.4673 12.1937 44.3291 12.0301 44.1566L6.63728 38.4738L6.54056 38.5692C6.18926 38.9154 5.7215 39.1227 5.22571 39.1519C4.72993 39.1811 4.24048 39.0301 3.84991 38.7276L0.386078 36.04C0.273112 35.9521 0.18029 35.8416 0.113714 35.7158C0.0471371 35.5899 0.00831205 35.4516 -0.000211393 35.31V35.25C0.00048265 34.9859 0.106965 34.7327 0.296045 34.5457V34.5457ZM7.92937 37.1984L7.49685 37.625L12.9177 43.3366C12.9698 43.3915 13.0326 43.4355 13.1024 43.466C13.1721 43.4965 13.2474 43.5129 13.3236 43.5141C13.3999 43.5153 13.4757 43.5014 13.5464 43.4732C13.6171 43.4449 13.6813 43.403 13.7353 43.3498C13.791 43.2978 13.8347 43.2347 13.8633 43.1646C13.892 43.0945 13.905 43.0191 13.9014 42.9436C13.9 42.8681 13.8831 42.7937 13.8517 42.7248C13.8204 42.656 13.7752 42.5941 13.7189 42.5429L7.92937 37.1984ZM5.50761 31.1017L1.31561 35.2368L4.60059 37.7839C4.75712 37.9052 4.95327 37.9658 5.15199 37.9542C5.35071 37.9426 5.53824 37.8596 5.67916 37.7209L6.21997 37.187L7.48468 35.9399L8.02549 35.4066C8.166 35.2678 8.25009 35.0831 8.26186 34.8873C8.27363 34.6915 8.21227 34.4983 8.08936 34.3441L5.50761 31.1017Z" fill="#E5DF96"/>
                <path d="M14.7467 14.0514L15.7275 22.8814C15.7633 23.2022 16.0343 23.4451 16.3574 23.4451H32.1986C32.5217 23.4451 32.7927 23.2022 32.8285 22.8814L33.8093 14.0514C35.5376 13.2008 36.6341 11.4559 36.6341 9.50479C36.6341 6.70964 34.3599 4.43565 31.565 4.43565C31.4091 4.43565 31.253 4.44268 31.0978 4.45709C30.0701 1.80719 27.4711 0 24.5948 0C21.6623 0 19.059 1.84063 18.0572 4.54781C17.7089 4.47321 17.3524 4.43548 16.991 4.43548C14.1959 4.43548 11.9219 6.70964 11.9219 9.50462C11.9219 11.4559 13.0184 13.2008 14.7467 14.0514ZM16.991 5.70281C17.428 5.70281 17.856 5.77586 18.2621 5.92026C18.4286 5.97977 18.613 5.96656 18.7689 5.88407C18.9255 5.8021 19.0405 5.65822 19.0863 5.48741C19.7534 3.00266 22.0188 1.26733 24.5948 1.26733C27.0996 1.26733 29.3479 2.94247 30.0618 5.34062C30.1553 5.65599 30.4746 5.84738 30.7963 5.78049C31.0476 5.72922 31.3062 5.70281 31.565 5.70281C33.6614 5.70281 35.3668 7.40813 35.3668 9.50462C35.3668 11.0655 34.4311 12.4507 32.9832 13.0332C32.7666 13.1205 32.6157 13.3195 32.5896 13.5512L31.6312 22.1776H16.9248L15.9664 13.5513C15.9405 13.3196 15.7894 13.1207 15.5728 13.0334C14.1249 12.4509 13.1892 11.0657 13.1892 9.50479C13.1892 7.4083 14.8945 5.70281 16.991 5.70281Z" fill="#E5DF96"/>
                <path d="M15.7235 10.1385C16.0737 10.1385 16.3572 9.85472 16.3572 9.50487C16.3572 8.80604 16.9258 8.23754 17.6245 8.23754C17.9747 8.23754 18.2582 7.95372 18.2582 7.60388C18.2582 7.25403 17.9747 6.97021 17.6245 6.97021C16.2267 6.97021 15.0898 8.10721 15.0898 9.50487C15.0898 9.85472 15.3731 10.1385 15.7235 10.1385Z" fill="#E5DF96"/>
                <path d="M22.0599 6.33653C22.4101 6.33653 22.6936 6.05271 22.6936 5.70287C22.6936 5.00404 23.2623 4.43554 23.9609 4.43554C24.3111 4.43554 24.5946 4.15172 24.5946 3.80188C24.5946 3.45203 24.3111 3.16821 23.9609 3.16821C22.5631 3.16821 21.4263 4.30521 21.4263 5.70287C21.4263 6.05289 21.7097 6.33653 22.0599 6.33653Z" fill="#E5DF96"/>
                <path d="M29.0301 10.1385C29.3803 10.1385 29.6638 9.85472 29.6638 9.50487C29.6638 8.80604 30.2325 8.23754 30.9311 8.23754C31.2813 8.23754 31.5648 7.95372 31.5648 7.60388C31.5648 7.25403 31.2813 6.97021 30.9311 6.97021C29.5333 6.97021 28.3965 8.10721 28.3965 9.50487C28.3965 9.85472 28.68 10.1385 29.0301 10.1385Z" fill="#E5DF96"/>
                <path d="M19.5259 26.9303C19.5259 27.8037 20.2362 28.5143 21.11 28.5143C21.9837 28.5143 22.694 27.8037 22.694 26.9303C22.694 26.0569 21.9837 25.3462 21.11 25.3462C20.2362 25.3462 19.5259 26.0569 19.5259 26.9303ZM21.4269 26.9303C21.4269 27.105 21.2845 27.247 21.1101 27.247C20.9355 27.247 20.7934 27.105 20.7934 26.9303C20.7934 26.7555 20.9357 26.6135 21.1101 26.6135C21.2845 26.6133 21.4269 26.7553 21.4269 26.9303Z" fill="#E5DF96"/>
                <path d="M25.8618 26.9303C25.8618 27.8037 26.5721 28.5143 27.4459 28.5143C28.3196 28.5143 29.03 27.8037 29.03 26.9303C29.03 26.0569 28.3196 25.3462 27.4459 25.3462C26.5721 25.3462 25.8618 26.0569 25.8618 26.9303ZM27.7628 26.9303C27.7628 27.105 27.6205 27.247 27.4461 27.247C27.2717 27.247 27.1293 27.105 27.1293 26.9303C27.1293 26.7555 27.2717 26.6135 27.4461 26.6135C27.6205 26.6135 27.7628 26.7553 27.7628 26.9303Z" fill="#E5DF96"/>
                <path d="M36.7697 30.9552C36.5432 30.774 36.222 30.7699 35.9918 30.9453C35.0407 31.6656 33.1459 32.2088 31.5834 32.2088C29.6001 32.2088 28.0816 31.4987 26.9399 30.0384C26.8199 29.8846 26.6355 29.7949 26.4405 29.7949H22.0843C21.8893 29.7949 21.705 29.8846 21.5849 30.0381C20.411 31.5393 19.0082 32.2088 17.0361 32.2088C15.6717 32.2088 14.3282 31.7599 13.2528 30.9453C13.022 30.7702 12.7007 30.7741 12.4749 30.9552C12.2483 31.1362 12.1736 31.4481 12.2936 31.7124C13.4322 34.2206 15.9891 36.7515 19.1357 36.7515C20.8708 36.7515 22.8082 36.5467 24.2971 35.1398C25.8744 36.5723 28.1541 36.7515 29.7994 36.7515C32.959 36.7515 35.8419 34.1549 36.9508 31.7124C37.071 31.4481 36.9961 31.1363 36.7697 30.9552ZM29.7994 35.4842C27.305 35.4842 25.711 34.9539 24.7822 33.8152C24.6622 33.6679 24.4821 33.5822 24.2916 33.5822C24.101 33.5822 23.9208 33.6679 23.8009 33.8152C22.8337 35.0006 21.4824 35.4842 19.1358 35.4842C17.3655 35.4842 15.7794 34.4268 14.6576 33.0915C15.4206 33.344 16.2256 33.476 17.0362 33.476C19.262 33.476 21.015 32.6858 22.3858 31.0621H26.1401C27.4995 32.6642 29.33 33.476 31.5836 33.476C32.4493 33.476 33.5546 33.3225 34.6008 32.9989C33.3743 34.3887 31.5939 35.4842 29.7994 35.4842Z" fill="#E5DF96"/>
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
                        <button class="btn-style border-0" type="submit">註冊</button>    
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <?php if(isset($_SESSION["signUp"])): ?>
        <?php if($_SESSION["signUp"]["condition"]==1): ?>
            <script>
                Toastify({
                text: "註冊成功",
                duration: 3000,
                destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "left", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(135deg, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%)",
                },
                onClick: function(){} // Callback after click
                }).showToast();
            </script>
        <?php unset($_SESSION["signUp"]); ?>
        <?php endif; ?>
    <?php endif; ?>
  </body>
</html>