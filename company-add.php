<div class=" new-company-page position_abs flex_center invisible">
    <div class="cover position_abs"></div>
    <form class="new-company-form position-rel" action="
    " method="GET">
        <i class="fa-solid fa-xmark position_abs"></i>
        <h2 class="company-title text-center">新增廠商</h2>
        <div class="mb-2">
            <label for="" class="form-label">公司名稱</label>
            <input type="text" class="form-control" name="name" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">帳號(信箱)</label>
            <input type="text" class="form-control" name="email" placeholder="company_email@test.com">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">密碼</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">電話</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">地址</label>
            <input type="text" name="address" class="form-control">
        </div>    
        <div class="mb-3">
            <label for="" class="form-label">公司簡介</label>
            <textarea class="form-control" id="" rows="3"></textarea>
        </div>        
        <div class="mb-3 flex_center">
            <button class="add-detail-btn save-and-add-company-btn me-3" type="submit transition">新增廠商</button>
            <button class="add-detail-btn back-company transition">返回廠商會員列表</button>
        </div>
    </form>
</div>