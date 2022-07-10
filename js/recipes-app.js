//perPage onchange
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
	newMaterialName.value = "";
	newMaterialQ.value = "";

	// console.log(newMaterialQ);
	col_8.appendChild(newMaterialName);
	col_4.appendChild(newMaterialQ);
	row.appendChild(col_8);
	row.appendChild(col_4);
	materialContainer.appendChild(row);
});
// call add page
let newRecipePage = document.querySelector(".new-recipe-page");
let addRecipeBtn = document.querySelector(".add-recipe-btn");
let backToRecipe = document.querySelector(".back-recipe");
let xMark = document.querySelector(".addXMark");

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

//detail page img
let modifyImg = document.querySelectorAll(".detail-file");
let detailImg = document.querySelectorAll(".detailImgPre");

for (let i = 0; i < modifyImg.length; i++) {
	modifyImg[i].addEventListener("change", (e) => {
		let file = modifyImg[i].files[0].name;
		if (file) {
			detailImg[i].src = `img/recipe_img/${file}`;
		}
	});
}
// add detail material
let detailMaterialBtns = document.querySelectorAll(".detail-material-btn");
let detailMaterialName = document.querySelectorAll(".detail-material-name");
let detailMaterialQ = document.querySelectorAll(".detail-material-q");
let detailMaterialContainer = document.querySelectorAll(
	".detail-material-container"
);
let x = 1;
// console.log(detailMaterialName);
for (let i = 0; i < detailMaterialBtns.length; i++) {
	detailMaterialBtns[i].addEventListener("click", (e) => {
		//select Name & Q input

		e.preventDefault();

		let id = detailMaterialName[0].dataset.id;
		console.log(id);
		let materialNum =
			detailMaterialName[detailMaterialName.length - 1].materialNum;
		console.log(materialNum);

		let row = document.createElement("div");
		row.classList.add("row", "mb-3", "ms-3");
		let col = document.createElement("div");
		col.classList.add("col");
		let col_3 = document.createElement("div");
		col_3.classList.add("col-3");

		let newDetailMaterialName = detailMaterialName[i].cloneNode();
		let newDetailMaterialQ = detailMaterialQ[i].cloneNode();
		if (x == 1) {
			newDetailMaterialName.name = `material-name-${x}`;
			newDetailMaterialQ.name = `material-q-${x}`;
			x++;
		} else {
			newDetailMaterialName.name = `material-name-${x}`;
			newDetailMaterialQ.name = `material-q-${x}`;
			x++;
		}
		newDetailMaterialName.value = "";
		newDetailMaterialQ.value = "";

		// console.log(newMaterialQ);
		col.appendChild(newDetailMaterialName);
		col_3.appendChild(newDetailMaterialQ);
		row.appendChild(col);
		row.appendChild(col_3);
		detailMaterialContainer[i].appendChild(row);
	});
}

// modify detail ---------------------------------------
// modify & save btn
let modifyBtn = document.querySelectorAll(".modify-detail-btn");
let saveBtn = document.querySelectorAll(".save-detail-btn");
// inputs
// let detailInputs = document.querySelectorAll(".detail-item-input");
let detailSelects = document.querySelectorAll(".detail-item-select");
let detailImgs = document.querySelectorAll(".detail-item-img");

for (let j = 0; j < modifyBtn.length; j++) {
	modifyBtn[j].addEventListener("click", (e) => {
		let detailInputs = document.querySelectorAll(".detail-item-input");
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
		for (let i = 0; i < detailSelects.length; i++) {
			detailSelects[i].disabled = false;
		}
		for (let i = 0; i < detailImgs.length; i++) {
			detailImgs[i].disabled = false;
		}
		for (let i = 0; i < detailMaterialBtns.length; i++) {
			detailMaterialBtns[i].classList.remove("point-event-none");
		}
	});
}

for (let j = 0; j < saveBtn.length; j++) {
	saveBtn[j].addEventListener("click", (e) => {
		let detailInputs = document.querySelectorAll(".detail-item-input");
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
		for (let i = 0; i < detailSelects.length; i++) {
			detailSelects[i].disabled = true;
		}
		for (let i = 0; i < detailImgs.length; i++) {
			detailImgs[i].disabled = true;
		}
		for (let i = 0; i < detailMaterialBtns.length; i++) {
			detailMaterialBtns[i].classList.add("point-event-none");
		}
	});
}
// !! back to recipe index btn
for (let j = 0; j < backToRecipeDe.length; j++) {
	backToRecipeDe[j].addEventListener("click", function (e) {
		let detailInputs = document.querySelectorAll(".detail-item-input");
		e.preventDefault();
		detailPage[j].classList.add("invisible");
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
		for (let i = 0; i < detailSelects.length; i++) {
			detailSelects[i].disabled = true;
		}
		for (let i = 0; i < detailImgs.length; i++) {
			detailImgs[i].disabled = true;
		}
		for (let i = 0; i < detailMaterialBtns.length; i++) {
			detailMaterialBtns[i].classList.add("point-event-none");
		}
	});
}
for (let j = 0; j < detailXMark.length; j++) {
	detailXMark[j].addEventListener("click", function (e) {
		let detailInputs = document.querySelectorAll(".detail-item-input");
		detailPage[j].classList.add("invisible");
		for (let i = 0; i < modifyBtn.length; i++) {
			modifyBtn[i].disabled = false;
			saveBtn[i].disabled = true;
		}
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
		for (let i = 0; i < detailMaterialBtns.length; i++) {
			detailMaterialBtns[i].classList.add("point-event-none");
		}
	});
}
