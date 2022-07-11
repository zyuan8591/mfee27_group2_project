
let navDropBtns = document.querySelectorAll(".nav_dropdown");
let subNavContainer = document.querySelectorAll(".sub_nav_item_container");
let mainNavItems = document.querySelectorAll(".main_nav_item");
let subNavItems = document.querySelectorAll(".sub_nav_item_container li");
// navbar animation ------------------------------------------------------------
for (let i = 0; i < mainNavItems.length; i++) {
	mainNavItems[i].addEventListener("click", function () {
		for (let j = 0; j < subNavContainer.length; j++) {
			if (
				!subNavContainer[j].classList.contains("translateYtoNone") &&
				i != j
			) {
				navDropBtns[j].classList.toggle("nav_dropdown_active");
			}
			if (i != j) {
				subNavContainer[j].classList.add("translateYtoNone");
			}
		}
		subNavContainer[i].classList.toggle("translateYtoNone");
		navDropBtns[i].classList.toggle("nav_dropdown_active");
	});
} 

// navbar sub item click active class ------------------------------------------
// for (let i = 0; i < subNavItems.length; i++) {
// 	subNavItems[i].addEventListener("click", (e) => {
// 		for (let j = 0; j < subNavItems; j++) {
// 			subNavItems[j].classList.remove("sub_nav_item_active");
// 		}
// 		subNavItems[i].classList.add("sub_nav_item_active");
// 	});
// }
// filter hover
let filterItems = document.querySelectorAll(".filter-item");
let filterDropDowm = document.querySelectorAll(".filter-dropdown");
for (let i = 0; i < filterItems.length; i++) {
	filterItems[i].addEventListener("mouseover", (e) => {
		filterDropDowm[i].classList.remove("invisible");
	});
	filterItems[i].addEventListener("mouseout", (e) => {
		filterDropDowm[i].classList.add("invisible");
	});
}
//perpage 每頁顯示x筆
let perPage = document.querySelector(".per-page");
let searchForm = document.querySelector(".company_search");
perPage.addEventListener("change", function () {
	searchForm.submit();
});
// call add page 新增廠商
let newCompanyPage = document.querySelector(".new-company-page");// 新增廠商頁面
let addCompanyBtn = document.querySelector(".add-company-btn");// 新增廠商btn
let backToCompany = document.querySelector(".back-company");// 返回列表btn
let xMark = document.querySelector(".xmark-add");

addCompanyBtn.addEventListener("click", function (e) {
	e.preventDefault();
	newCompanyPage.classList.remove("invisible");
});
backToCompany.addEventListener("click", function (e) {
	e.preventDefault();
	newCompanyPage.classList.add("invisible");
});
xMark.addEventListener("click", function (e) {
	newCompanyPage.classList.add("invisible");
});

//add page img
let addImg = document.querySelector("#add-company-image");
let newImg = document.querySelector("#add-new-img");
let svgImg = document.querySelector(".add-svg-img");

addImg.addEventListener("change",(e) => {
	let file = addImg.files[0].name;
	if(file){
		newImg.classList.remove("d-none");
		newImg.src = `./company_img/${file}`;
		svgImg.classList.add("d-none");
	}
});

// call detail page 詳細資料
let detailPage = document.querySelectorAll(".company-datail");
let detailBtn = document.querySelectorAll(".detail"); //詳細資料btn
let detailCover = document.querySelector(".cover-detail");
let backToCompanyDe = document.querySelectorAll(".back-company-de");
let detailXMark = document.querySelectorAll(".detail-xMark");

for (let i = 0; i < detailBtn.length; i++) {
	detailBtn[i].addEventListener("click", (e) => {
		e.preventDefault();
		detailPage[i].classList.remove("invisible");
	});
}

detailCover.addEventListener("click", (e) => {
	detailPage.classList.add("invisible");
});

//detail img
let modifyImg = document.querySelectorAll(".detail-file");
let detailImg = document.querySelectorAll(".detailImgPre");

for (let i = 0; i < modifyImg.length; i++) {
	modifyImg[i].addEventListener("change", (e) => {
		let file = modifyImg[i].files[0].name;
		if (file) {
			detailImg[i].src = `./company_img/${file}`;
		}
	});
}

// modify detail ---------------------------------------
// modify & save btn 儲存
let modifyBtn = document.querySelectorAll(".modify-detail-btn"); //修改btn
let saveBtn = document.querySelectorAll(".save-detail-btn");
// form
let modifyForm = document.querySelectorAll(".modify-company-detail-form");
// inputs
let detailInputs = document.querySelectorAll(".detail-item-input");
let detailImgs = document.querySelectorAll(".detail-item-img");
// let addImageContainer = document.querySelectorAll(".add-image-container");

for(let j=0; j<modifyBtn.length; j++){
modifyBtn[j].addEventListener("click", (e) => {
	e.preventDefault();
	modifyBtn[j].disabled = true;
	saveBtn[j].disabled = false;
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].removeAttribute("readonly");
		detailInputs[i].classList.remove("form-control-plaintext");
		detailInputs[i].classList.add("form-control");
	}

	// for (let i = 0; i < addImageContainer; i++){
	// 	addImageContainer[i].classList.add("form-control");
	// }

	for (let i = 0; i < detailImgs.length; i++) {
		detailImgs[i].disabled = false;
	}
});
}
for(let j=0; j<saveBtn.length; j++){
saveBtn[j].addEventListener("click", () => {
	modifyBtn[j].disabled = false;
	saveBtn[j].disabled = true;
    modifyForm[j].submit();
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}

	for (let i = 0; i < detailImgs.length; i++) {
		detailImgs[i].disabled = true;
	}
});
}
// !! back to recipe index btn 返回列表
for(let j=0; j<backToCompanyDe.length; j++){
backToCompanyDe[j].addEventListener("click", function (e) {
	e.preventDefault();
	detailPage[j].classList.add("invisible");
	modifyBtn[j].disabled = false;
	saveBtn[j].disabled = true;
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}

	for (let i = 0; i < detailImgs.length; i++) {
		detailImgs[i].disabled = true;
	}
});
}
for(let j=0; j<detailXMark.length; j++){
detailXMark[j].addEventListener("click", function (e) {
	detailPage[j].classList.add("invisible");
	modifyBtn[j].disabled = false;
	saveBtn[j].disabled = true;
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}

	for (let i = 0; i < detailImgs.length; i++) {
		detailImgs[i].disabled = true;
	}
});
}
