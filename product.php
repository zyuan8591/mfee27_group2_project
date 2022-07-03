<main class="main position-rel">
			<div>
				<h2 class="main-title">商品總覽</h2>
			</div>
			<div class="d-flex justify-content-between align-items-center flex-wrap sort-search">
				<div class="sort d-flex align-items-center">
					<a class="sort-btn transition" href="">依編號排序</a>
					<a class="sort-btn transition" href="">依名稱排序</a>
					<a class="sort-btn transition" href="">依日期排序</a>
				</div>
				<form class="product_search " action="" method="get">
					<div class="d-flex align-items-center " >
						<div class="d-flex ">
							<input class="form-control search-box " type="text" name="product_search" placeholder="搜尋商品名稱">
						</div>
						<div class="">
							<button class="search-btn form-control">
								<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.7292 18.8489L10.8802 11.9999C10.3594 12.4513 9.75174 12.8029 9.05729 13.0546C8.36285 13.3063 7.625 13.4322 6.84375 13.4322C4.96875 13.4322 3.38021 12.7812 2.07812 11.4791C0.776042 10.177 0.125 8.60582 0.125 6.76554C0.125 4.92527 0.776042 3.35409 2.07812 2.052C3.38021 0.749919 4.96007 0.098877 6.81771 0.098877C8.65799 0.098877 10.2248 0.749919 11.5182 2.052C12.8116 3.35409 13.4583 4.92527 13.4583 6.76554C13.4583 7.51207 13.3368 8.23256 13.0937 8.927C12.8507 9.62145 12.4861 10.2725 12 10.8801L18.875 17.703L17.7292 18.8489ZM6.81771 11.8697C8.22396 11.8697 9.42188 11.3706 10.4115 10.3723C11.401 9.37405 11.8958 8.17179 11.8958 6.76554C11.8958 5.35929 11.401 4.15704 10.4115 3.15877C9.42188 2.16051 8.22396 1.66138 6.81771 1.66138C5.3941 1.66138 4.18316 2.16051 3.1849 3.15877C2.18663 4.15704 1.6875 5.35929 1.6875 6.76554C1.6875 8.17179 2.18663 9.37405 3.1849 10.3723C4.18316 11.3706 5.3941 11.8697 6.81771 11.8697Z" fill="#222222"/>
								</svg>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="d-flex justify-content-between align-items-center my-3">
				<div class="filter d-flex align-items-center">					
					<!-- <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.218261 1.27627C0.593094 0.496667 1.39012 0 2.26588 0H26.7374C27.6154 0 28.4085 0.496667 28.7823 1.27627C29.1619 2.05587 29.0429 2.97833 28.4424 3.64576L18.127 16.1221V23.215C18.127 23.8902 17.7418 24.5097 17.1244 24.811C16.5126 25.1124 15.7762 25.051 15.2267 24.6436L11.6013 21.965C11.1425 21.6301 10.8762 21.1 10.8762 20.5363V16.1221L0.512202 3.64576C-0.0422022 2.97833 -0.156629 2.05587 0.218317 1.27627H0.218261Z" fill="black"/>
					</svg> -->
                    <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5701 1.9264L1.5739 1.9185C1.69657 1.67108 1.96042 1.5 2.26588 1.5H26.7374C27.0464 1.5 27.309 1.6729 27.4298 1.92489L27.4298 1.9249L27.4337 1.93284C27.5472 2.16604 27.5171 2.43152 27.3273 2.64252L27.3064 2.66581L27.2864 2.68995L16.971 15.1663L16.627 15.5823V16.1221V23.215C16.627 23.3139 16.5713 23.4118 16.4665 23.463L16.4616 23.4654C16.3465 23.5221 16.2115 23.5065 16.1201 23.4386L16.1181 23.4372L12.4927 20.7585L12.4927 20.7585L12.4855 20.7533C12.4167 20.703 12.3762 20.6247 12.3762 20.5363V16.1221V15.5804L12.0301 15.1637L1.66605 2.68731C1.66605 2.6873 1.66604 2.68729 1.66603 2.68728C1.48508 2.46941 1.45046 2.17516 1.5701 1.9264Z" fill="white" stroke="#393939" stroke-width="3"/>
                    </svg>
					<div class="filter-item  position-rel">
						<button class="filter-btn transition">商品種類</button>
						<ul class="filter-dropdown position_abs unstyled_list invisible text-center">
							<li><a href="">Coffee</a></li>
							<li><a href="">Cake</a></li>
							<li><a href=""></a></li>
						</ul>							
					</div>
					<div class=" filter-item position-rel">
						<button class=" filter-btn transition">商品狀態</button>
						<ul class="filter-dropdown  unstyled_list position_abs invisible text-center">
							<li><a class="text-nowrap " href="">上架中</a></li>
							<li><a href="">下架中</a></li>
						</ul>
					</div>					
				</div>
				<div>
					<a class="add-product-btn transition" href="">新增商品</a>
				</div>
			</div>
			<table class="table table-hover">
				<thead class="table-dark">
					<tr class="">
						<th class="text-center" scope="col">商品編號</th>
						<th scope="col">店家</th>
						<th scope="col">商品名稱</th>
						<th scope="col">商品主類別</th>
						<th scope="col">商品次類別</th>
						<th scope="col">商品狀態</th>
						<th scope="col">新增日期</th>
						<th scope="col">編輯商品</th>
					</tr>
				</thead>
				<tbody class="">
					<tr class="">
						<th class="text-center" scope="row">1</th>
						<td>SodaStream</td>
						<td>氣泡水機</td>
						<td>冷熱調理</td>
						<td>氣泡水機</td>
						<td>上架中</td>
						<td>2022/07/01</td>
						<td class="text-nowrap">
							<button class="table-btn">上架</button>
							<button class="table-btn">下架</button>
							<button class="table-btn">詳細資訊</button>	
						</td>
					</tr>
				</tbody>
			</table>
		</main>