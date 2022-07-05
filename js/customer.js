let customerOpenBtn = document.querySelector("#customer-add-openBtn");
let customerCloseBtn = document.querySelector("#customer-close-btn");
let userAddPage = document.querySelector(".user-add-page");
// let openMsg=document.querySelector("#openMsg");
let customerMain = document.querySelector("#customer-add-main");

customerOpenBtn.addEventListener("click", function () {
	customerMain.classList.remove("close");
	userAddPage.classList.remove("d-none");
});

customerCloseBtn.addEventListener("click", function (e) {
	e.preventDefault();
	customerMain.classList.add("close");
	userAddPage.classList.add("d-none");
});

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

// call detail page
let detailPage = document.querySelector(".recipe-datail");
let detailBtn = document.querySelectorAll(".detail");
let detailCover = document.querySelector(".cover-detail");
let backToRecipeDe = document.querySelector(".back-recipe-de");
let detailXMark = document.querySelector(".detail-xMark");

for (let i = 0; i < detailBtn.length; i++) {
	detailBtn[i].addEventListener("click", (e) => {
		e.preventDefault();
		detailPage.classList.remove("invisible");
	});
}

// modify detail ---------------------------------------
// modify & save btn
let modifyBtn = document.querySelector(".modify-detail-btn");
let saveBtn = document.querySelector(".save-detail-btn");
// form
let modifyForm = document.querySelector(".modify-ricepe-detail-form");
// inputs
let detailInputs = document.querySelectorAll(".detail-item-input");
let detailSelects = document.querySelectorAll(".detail-item-select");
let detailImgs = document.querySelectorAll(".detail-item-img");
modifyBtn.addEventListener("click", (e) => {
	e.preventDefault();
	modifyBtn.disabled = true;
	saveBtn.disabled = false;
	saveBtn.classList.add("save-detail-btn-hover");
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].removeAttribute("readonly");
		detailInputs[i].classList.remove("form-control-plaintext");
		detailInputs[i].classList.add("form-control");
	}
	for (let i = 0; i < detailSelects.length; i++) {
		detailSelects[i].disabled = false;
	}
	for (let i = 0; i < detailImgs.length; i++) {
		detailImgs[i].disabled = false;
	}
});
saveBtn.addEventListener("click", (e) => {
	modifyBtn.disabled = false;
	saveBtn.disabled = true;
	saveBtn.classList.remove("save-detail-btn-hover");
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}
	for (let i = 0; i < detailSelects.length; i++) {
		detailSelects[i].disabled = true;
	}
	for (let i = 0; i < detailImgs.length; i++) {
		detailImgs[i].disabled = true;
	}
});
// !! back to recipe index btn
backToRecipeDe.addEventListener("click", function (e) {
	e.preventDefault();
	detailPage.classList.add("invisible");
	modifyBtn.disabled = false;
	saveBtn.disabled = true;
	saveBtn.classList.remove("save-detail-btn-hover");
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}
	for (let i = 0; i < detailSelects.length; i++) {
		detailSelects[i].disabled = true;
	}
	for (let i = 0; i < detailImgs.length; i++) {
		detailImgs[i].disabled = true;
	}
});
detailXMark.addEventListener("click", function (e) {
	detailPage.classList.add("invisible");
	modifyBtn.disabled = false;
	saveBtn.disabled = true;
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}
	for (let i = 0; i < detailSelects.length; i++) {
		detailSelects[i].disabled = true;
	}
	for (let i = 0; i < detailImgs.length; i++) {
		detailImgs[i].disabled = true;
	}
});
