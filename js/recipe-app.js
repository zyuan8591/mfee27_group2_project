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
let newRecipePage = document.querySelector(".new-recipe-page");
let addRecipeBtn = document.querySelector(".add-recipe-btn");
let backToRecipe = document.querySelector(".back-recipe");
let xMark = document.querySelector(".fa-xmark");

addRecipeBtn.addEventListener("click", function (e) {
	e.preventDefault();
	newRecipePage.classList.remove("invisible");
});
backToRecipe.addEventListener("click", function (e) {
	e.preventDefault();
	newRecipePage.classList.add("invisible");
});
xMark.addEventListener("click", function (e) {
	newRecipePage.classList.add("invisible");
});

// call detail page
let detailPage = document.querySelector(".recipe-datail");
let detailBtn = document.querySelectorAll(".detail"); //
let detailCover = document.querySelector(".cover-detail");
let backToRecipeDe = document.querySelector(".back-recipe-de");
let detailXMark = document.querySelector(".detail-xMark");

for (let i = 0; i < detailBtn.length; i++) {
	detailBtn[i].addEventListener("click", (e) => {
		e.preventDefault();
		detailPage.classList.remove("invisible");
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
let modifyForm = document.querySelector(".modify-ricepe-detail-form");
// inputs
let detailInputs = document.querySelectorAll(".detail-item-input");
// let detailSelects = document.querySelectorAll(".detail-item-select");
let detailImgs = document.querySelectorAll(".detail-item-img");
modifyBtn.addEventListener("click", (e) => {
	e.preventDefault();
	modifyBtn.disabled = true;
	saveBtn.disabled = false;
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
	for (let i = 0; i < detailInputs.length; i++) {
		detailInputs[i].setAttribute("readonly", "readonly");
		detailInputs[i].classList.remove("form-control");
		detailInputs[i].classList.add("form-control-plaintext");
	}
	for (let i = 0; i < detailSelects.length; i++) {
		detailSelects[i].disabled = true;
	}
	// for (let i = 0; i < detailImgs.length; i++) {
	// 	detailImgs[i].disabled = true;
	// }
});
// !! back to recipe index btn
backToRecipeDe.addEventListener("click", function (e) {
	e.preventDefault();
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
	// for (let i = 0; i < detailImgs.length; i++) {
	// 	detailImgs[i].disabled = true;
	// }
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
	// for (let i = 0; i < detailImgs.length; i++) {
	// 	detailImgs[i].disabled = true;
	// }
});
