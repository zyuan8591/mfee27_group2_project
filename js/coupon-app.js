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
	percentDiscountInput.style.display = "none";
	underchargedInput.style.display = "none";
});
couponXMark.addEventListener("click", function (e) {
	newCouponPage.classList.add("invisible");
	percentDiscountInput.style.display = "none";
	underchargedInput.style.display = "none";
});

// call detail page
let detailCouponPage = document.querySelectorAll(".detail-coupon-page");
let couponDetailBtn = document.querySelectorAll(".coupon-detail");
let detailCover = document.querySelector(".cover-detail");
let backCoupon = document.querySelectorAll(".backCoupon");
let detailXMark = document.querySelectorAll(".detail-xMark");

console.log(detailCouponPage[1]);
for (let i = 0; i < couponDetailBtn.length; i++) {
	couponDetailBtn[i].addEventListener("click", (e) => {
		e.preventDefault();
		detailCouponPage[i].classList.remove("invisible");
	});
}

let modifyBtn = document.querySelectorAll(".modify-detail-btn");
let saveBtn = document.querySelectorAll(".save-detail-btn");
// form
let modifyForm = document.querySelector(".modify-coupon-detail-form");
// inputs
let detailInputs = document.querySelectorAll(".detail-item-input");
let detailSelect = document.querySelectorAll(".detailSelect"); //1
let originalDiscount = document.querySelectorAll(".originalDiscount"); //1

for (let j = 0; j < modifyBtn.length; j++) {
	modifyBtn[j].addEventListener("click", (e) => {
		e.preventDefault();
		for (let i = 0; i < modifyBtn.length; i++) {
			modifyBtn[i].disabled = true;
			saveBtn[i].disabled = false;
			saveBtn[i].classList.add("save-detail-btn-hover");
		}
		for (let i = 0; i < detailInputs.length; i++) {
			detailInputs[i].removeAttribute("readonly");
			detailInputs[i].classList.remove("form-control-plaintext");
			detailInputs[i].classList.add("form-control");
		}
		for (let i = 0; i < originalDiscount.length; i++) {
			originalDiscount[i].style.display = "none"; //1
		}
		for (let i = 0; i < detailSelect.length; i++) {
			detailSelect[i].style.display = "block"; //1
		}
	});
}
for (let j = 0; j < saveBtn.length; j++) {
	saveBtn[j].addEventListener("click", (e) => {
		for (let i = 0; i < modifyBtn.length; i++) {
			modifyBtn[i].disabled = false;
			saveBtn.disabled = true;
			saveBtn.classList.remove("save-detail-btn-hover");
		}

		for (let i = 0; i < detailInputs.length; i++) {
			detailInputs[i].setAttribute("readonly", "readonly");
			detailInputs[i].classList.remove("form-control");
			detailInputs[i].classList.add("form-control-plaintext");
		}
	});
}
//detail折扣選單
let detailDiscountSelect = document.querySelectorAll("#detailDiscountSelect");
let detailpercentDiscountInput = document.querySelectorAll(
	".detailpercentDiscountInput"
);
let detailunderchargedInput = document.querySelectorAll(
	".detailunderchargedInput"
);
for (let i = 0; i < detailDiscountSelect.length; i++) {
	detailDiscountSelect[i].addEventListener("change", (e) => {
		switch (e.target.value) {
			case "A": {
				detailpercentDiscountInput[i].style.display = "flex";
				detailunderchargedInput[i].style.display = "none";
				break;
			}
			case "B": {
				detailpercentDiscountInput[i].style.display = "none";
				detailunderchargedInput[i].style.display = "flex";
				break;
			}
			default: {
				detailpercentDiscountInput[i].style.display = "none";
				detailunderchargedInput[i].style.display = "none";
				break;
			}
		}
	});
}

// !! back to coupon index btn
for (let j = 0; j < backCoupon.length; j++) {
	backCoupon[j].addEventListener("click", function (e) {
		e.preventDefault();
		detailCouponPage[j].classList.add("invisible");
		for (let i = 0; i < modifyBtn.length; i++) {
			modifyBtn[i].disabled = false;
			saveBtn[i].disabled = true;
			saveBtn[i].classList.remove("save-detail-btn-hover");
		}

		for (let i = 0; i < detailInputs.length; i++) {
			detailInputs[i].setAttribute("readonly", "readonly");
			detailInputs[i].classList.remove("form-control");
			detailInputs[i].classList.add("form-control-plaintext");
		}
		for (let i = 0; i < originalDiscount.length; i++) {
			originalDiscount[i].style.display = "flex"; //1
		}
		for (let i = 0; i < detailSelect.length; i++) {
			detailSelect[i].style.display = "none"; //1
		}
	});
}
for (let j = 0; j < detailXMark.length; j++) {
	detailXMark[j].addEventListener("click", function (e) {
		detailCouponPage[j].classList.add("invisible");
		for (let i = 0; i < modifyBtn.length; i++) {
			modifyBtn[i].disabled = false;
			saveBtn[i].disabled = true;
		}
		for (let i = 0; i < detailInputs.length; i++) {
			detailInputs[i].setAttribute("readonly", "readonly");
			detailInputs[i].classList.remove("form-control");
			detailInputs[i].classList.add("form-control-plaintext");
		}
	});
}

//perPage onchange
let perPage = document.querySelector(".per-page");
let searchForm = document.querySelector(".coupon_search");
perPage.addEventListener("change", function () {
	searchForm.submit();
});

//verify Date
function dateTest() {
	var sDate = document.getElementById("sDate").value;
	var eDate = document.getElementById("eDate").value;
	if (eDate < sDate) {
		alert("結束日期不得小於起始日期");
		return false;
	} else {
		return true;
	}
}
function detailDateTest() {
	var startDate = document.getElementById("startDate").value;
	var endDate = document.getElementById("endDate").value;
	if (startDate > endDate) {
		alert("結束日期不得小於起始日期");
		return false;
	} else {
		return true;
	}
}
//折扣選單
const discountSelect = document.getElementById("discountSelect");
const percentDiscountInput = document.getElementById("percentDiscountInput");
const underchargedInput = document.getElementById("underchargedInput");
let percentDiscountRe = document.getElementById("percentDiscount");
let underchargedRe = document.getElementById("undercharged");
discountSelect.addEventListener("change", (e) => {
	switch (e.target.value) {
		case "A": {
			underchargedRe.removeAttribute("required");
			percentDiscountInput.style.display = "flex";
			underchargedInput.style.display = "none";
			break;
		}
		case "B": {
			percentDiscountRe.removeAttribute("required");
			percentDiscountInput.style.display = "none";
			underchargedInput.style.display = "flex";
			break;
		}
		default: {
			percentDiscountInput.style.display = "none";
			underchargedInput.style.display = "none";
			break;
		}
	}
});
