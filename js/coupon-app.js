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

// call add page
let newCouponPage = document.querySelector(".new-coupon-page");
let addCouponBtn = document.querySelector(".add-coupon-btn");
let backToCoupon = document.querySelector(".back-coupon");
let couponXMark = document.querySelector(".coupon-xmark");

addCouponBtn.addEventListener("click", function (e) {
	e.preventDefault();
	newCouponPage.classList.remove("invisible");
});
backToCoupon.addEventListener("click", function (e) {
	e.preventDefault();
	newCouponPage.classList.add("invisible");
});
couponXMark.addEventListener("click", function (e) {
	newCouponPage.classList.add("invisible");
});


// call detail page
let detailCouponPage = document.querySelector(".detail-coupon-page");
let couponDetailBtn = document.querySelectorAll(".coupon-detail"); 
let detailCover = document.querySelector(".cover-detail");
let backCoupon = document.querySelector(".backCoupon");
let detailXMark = document.querySelector(".detail-xMark");

for (let i = 0; i < couponDetailBtn.length; i++) {
	couponDetailBtn[i].addEventListener("click", (e) => {
		e.preventDefault();
		detailCouponPage.classList.remove("invisible");
	});
}

// detailCover.addEventListener("click", (e) => {
// 	detailPage.classList.add("invisible");
// });

// modify detail ---------------------------------------
// modify & save btn
let modifyBtn = document.querySelector(".modify-detail-btn");
let saveBtn = document.querySelector(".save-detail-btn");
// form
let modifyForm = document.querySelector(".modify-coupon-detail-form");
// inputs
let detailInputs = document.querySelectorAll(".detail-item-input");

modifyBtn.addEventListener("click", (e) => {
	e.preventDefault();
	modifyBtn.disabled = true;
	saveBtn.disabled = false;
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].removeAttribute("readonly");
		detailInputs[i].classList.remove("form-control-plaintext");
		detailInputs[i].classList.add("form-control");
	}
});
saveBtn.addEventListener("click", (e) => {
	modifyBtn.disabled = false;
	saveBtn.disabled = true;
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}
});
// !! back to recipe index btn
backCoupon.addEventListener("click", function (e) {
	e.preventDefault();
	detailCouponPage.classList.add("invisible");
	modifyBtn.disabled = false;
	saveBtn.disabled = true;
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}
});
detailXMark.addEventListener("click", function (e) {
	detailCouponPage.classList.add("invisible");
	modifyBtn.disabled = false;
	saveBtn.disabled = true;
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}
});
