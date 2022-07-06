<div class="vh-100 d-flex justify-content-center align-items-center user-add-page d-none" >
    <div class="customer-add-main" id="customer-add-main"></div>
        <div class="contain">
            <h2 class="text-center border-bottom pb-3">一般會員註冊</h2>
            <form action="doCreate-customer.php" method="post" id="signUpform" class="signUpform">
                <div class="mb-2">
                    <label for="">姓名</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-2">
                    <label for="">帳號</label>
                    <input type="text" class="form-control" name="account">
                </div>
                <!-- <div class="mb-2">
                    <label for="">性別</label>
                    <div class="d-flex mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender"  value="male">
                            <label class="form-check-label" for="">
                            男</label>
                        </div>
                        <div class="form-check ms-3">
                            <input class="form-check-input" type="radio" name="gender"  value="female">
                            <label class="form-check-label" for="">
                            女</label>
                        </div>
                    </div>
                </div> -->
                <div class="mb-2">
                    <label for="">生日</label>
                    <div class="">
                        <input class="form-control" type="date" name="date">
                    </div>  
                </div>    
                <div class="mb-2">
                    <label for="">Phone</label>
                    <input type="tel" class="form-control" name="phone">
                </div>
                <div class="mb-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-2">
                    <label for="">地址</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="mb-2">
                    <label for="">密碼</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-2">
                    <label for="">再輸入一次密碼</label>
                    <input type="password" class="form-control" name="repassword">
                </div>
                <div class="d-flex mt-5 justify-content-center">
                    <button class="btn" type="submit" >新增會員</button>
                    <button id="customer-close-btn" class="btn ms-5">返回會員列表</button>     
                </div>
            </form>
        </div>
    </div>
</div>