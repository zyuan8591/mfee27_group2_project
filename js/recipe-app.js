//perPage
let perPage = document.querySelector(".per-page");
let searchForm = document.querySelector(".recipe_search");
perPage.addEventListener("change", function () {
	searchForm.submit();
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
// add new material btn
let newMaterialBtn = document.querySelector(".new-material-btn");
let materialName = document.querySelector(".material-name");
let materialQ = document.querySelector(".material-q");
let materialContainer = document.querySelector(".material-container");
// console.log(newMaterialBtn);
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
// add page image
let addImg = document.querySelector("#add-recipe-image");
let preImg = document.querySelector("#recipeImgPre");
let preSvg = document.querySelector("#recipeSvgPre");
addImg.addEventListener("change", (e) => {
	let file = addImg.files[0].name;
	if (file) {
		preImg.classList.remove("d-none");
		preImg.src = `img/recipe_img/${file}`;
		preSvg.classList.add("d-none");
	}
});

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
let detailPage = document.querySelectorAll(".recipe-datail");
let detailBtn = document.querySelectorAll(".detail");
let detailCover = document.querySelector(".cover-detail");
let backToRecipeDe = document.querySelectorAll(".back-recipe-de");
let detailXMark = document.querySelectorAll(".detail-xMark");

for (let i = 0; i < detailBtn.length; i++) {
	detailBtn[i].addEventListener("click", (e) => {
		e.preventDefault();
		detailPage[i].classList.remove("invisible");
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
for (let i = 0; i < backToRecipe.length; i++) {
	backToRecipeDe[i].addEventListener("click", function (e) {
		e.preventDefault();
		detailPage[i].classList.add("invisible");
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
}
for (let i = 0; i < detailXMark.length; i++) {
	detailXMark[i].addEventListener("click", function (e) {
		detailPage[i].classList.add("invisible");
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
}
