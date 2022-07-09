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

// add product page & detail page

let newProductPage = document.querySelector(".new-product-page");
let addProductBtn = document.querySelector(".add-product-btn");
let backProduct = document.querySelector(".back-product");
let backToProduct = document.querySelectorAll(".back-to-product");
let cover = document.querySelectorAll(".detail-cover");
let xMark = document.querySelector(".fa-xmark");
let detailPage = document.querySelectorAll(".detail-page");
let detailBtn = document.querySelectorAll(".detail-btn");

addProductBtn.addEventListener("click", function (e) {
	e.preventDefault();
	newProductPage.classList.remove("invisible");
	addImgInput.disabled = false;
});
backProduct.addEventListener("click", function (e) {
	e.preventDefault();
	newProductPage.classList.add("invisible");
});
for (let i = 0; i < backToProduct.length; i++) {
	backToProduct[i].addEventListener("click", function (e) {
		e.preventDefault();
		detailPage[i].classList.add("invisible");
	});
}
xMark.addEventListener("click", function (e) {
	newProductPage.classList.add("invisible");
});
for (let i = 0; i < cover.length; i++) {
	cover[i].addEventListener("click", (e) => {
		e.preventDefault();
		detailPage[i].classList.add("invisible");
	});
}
// detail page funcition

let saveBtn = document.querySelectorAll(".save-btn");
let reviseBtn = document.querySelectorAll(".revise-btn");
let input = document.querySelectorAll(".product-input");
let detailForm = document.querySelectorAll(".detail-form");
for (let j = 0; j < reviseBtn.length; j++) {
	reviseBtn[j].addEventListener("click", (e) => {
		e.preventDefault();
		saveBtn[j].disabled = false;
		reviseBtn[j].disabled = true;
		reviseBtn[j].classList.remove("revise-hover");
		saveBtn[j].classList.add("save-hover");

		for (let i = 0; i < input.length; i++) {
			input[i].removeAttribute("readonly");
			input[i].classList.remove("form-control-plaintext");
			input[i].classList.add("form-control");
			input[i].disabled = false;
		}
	});
}
for (let j = 0; j < saveBtn.length; j++) {
	saveBtn[j].addEventListener("click", (e) => {
		saveBtn[j].disabled = true;
		reviseBtn[j].disabled = false;
		reviseBtn[j].classList.add("revise-hover");
		saveBtn[j].classList.remove("save-hover");
		detailForm[j].submit();
		for (let i = 0; i < input.length; i++) {
			input[i].setAttribute("readonly", "readonly");
			input[i].classList.add("form-control-plaintext");
			input[i].classList.remove("form-control");
			input[i].disabled = true;
		}
	});
}
for (let i = 0; i < detailBtn.length; i++) {
	detailBtn[i].addEventListener("click", (e) => {
		e.preventDefault();
		detailPage[i].classList.remove("invisible");
		saveBtn[i].disabled = true;
		saveBtn[i].classList.remove("save-hover");
		reviseBtn[i].disabled = false;
		reviseBtn[i].classList.add("revise-hover");
		for (let i = 0; i < input.length; i++) {
			input[i].setAttribute("readonly", "readonly");
			input[i].disabled = true;
		}
	});
}
// page & count

let perPage = document.querySelector(".per-page");
let productSearch = document.querySelector(".product_search");

perPage.addEventListener("change", function (e) {
	productSearch.submit();
});

// add & revise img
