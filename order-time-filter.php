<form action="orders-index.php?page=1&per-page=<?=$perPage?>&order=<?=$order?>&orderStat=<?=$orderStat?>" method="get">
        <div class="row align-items-center">
            <div class="col-auto">
                <input type="date" class="form-control" name="startDate"
                value="<?=$startDate?>" >
            </div>
            <div class="col-auto">
                ~
            </div>
            <div class="col-auto">
            <input type="date" class="form-control"
                name="endDate"
                value="<?=$endDate?>"
                >
            </div>
            <div class="col-auto">
                <button class="btn btn-main" type="submit">查詢</button>
            </div>
            <div class="col-auto">
                <a class="btn btn-main" href="orders-index.php?page=1&order=<?=$order?>&orderStat=&per-page=<?=$perPage?>&startDate=&endDate=">清空</a>
            </div>
        </div>
</form> 