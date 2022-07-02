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
// add new material btn
let newMaterialBtn = document.querySelector(".new-material-btn");
let materialName = document.querySelector(".material-name");
let materialQ = document.querySelector(".material-q");
let materialContainer = document.querySelector(".material-container");
console.log(newMaterialBtn);
let i = 1;
newMaterialBtn.addEventListener("click", (e) => {
	e.preventDefault();
	let row = document.createElement("div");
	row.classList.add("row", "mb-3");
	let col_8 = document.createElement("div");
	col_8.classList.add("col-8");
	let col_4 = document.createElement("div");
	col_4.classList.add("col-4");

	let newMaterialName = materialName.cloneNode();
	let newMaterialQ = materialQ.cloneNode();
	if (i == 1) {
		newMaterialName.name = `material-name-${i}`;
		newMaterialQ.name = `material-q-${i}`;
		i++;
	} else {
		newMaterialName.name = `material-name-${i}`;
		newMaterialQ.name = `material-q-${i}`;
		i++;
	}
	console.log(newMaterialQ);
	col_8.appendChild(newMaterialName);
	col_4.appendChild(newMaterialQ);
	row.appendChild(col_8);
	row.appendChild(col_4);
	materialContainer.appendChild(row);
});

let newRecipePage = document.querySelector(".new-recipe-page");
let addRecipeBtn = document.querySelector(".add-recipe-btn");
let backToRecipe = document.querySelector(".back-recipe");
let cover = document.querySelector(".cover");

addRecipeBtn.addEventListener("click", function (e) {
	e.preventDefault();
	newRecipePage.classList.remove("invisible");
});
backToRecipe.addEventListener("click", function (e) {
	console.log("click");

	e.preventDefault();
	newRecipePage.classList.add("invisible");
});
cover.addEventListener("click", function (e) {
	newRecipePage.classList.add("invisible");
});

let newProductPage = document.querySelector(".new-product-page");
let addProductBtn = document.querySelector(".add-product-btn");
let backToProduct = document.querySelector(".back-product");

addProductBtn.addEventListener("click", function (e) {
	e.preventDefault();
	newProductPage.classList.remove("invisible");
});
backToProduct.addEventListener("click", function (e) {
	e.preventDefault();
	newProductPage.classList.add("invisible");
});
cover.addEventListener("click", function (e) {
	newProductPage.classList.add("invisible");
});
