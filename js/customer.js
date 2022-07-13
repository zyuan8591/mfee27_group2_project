//add customer
let customerOpenBtn = document.querySelector("#customer-add-openBtn");
let customerCloseBtn = document.querySelector("#customer-close-btn");
let userAddPage = document.querySelector(".user-add-page");
// let openMsg=document.querySelector("#openMsg");
let customerMain = document.querySelector("#customer-add-main");

customerOpenBtn.addEventListener("click", function () {
	// customerMain.classList.remove("close");
	userAddPage.classList.remove("d-none");
});

customerCloseBtn.addEventListener("click", function (e) {
	e.preventDefault();
	// customerMain.classList.add("close");
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

// modify detail ---------------------------------------
// modify & save btn
let modifyBtn = document.querySelectorAll(".modify-detail-btn");
let saveBtn = document.querySelectorAll(".save-detail-btn");
// form
let modifyForm = document.querySelector(".modify-ricepe-detail-form");
// inputs
let detailInputs = document.querySelectorAll(".detail-item-input");
let detailSelects = document.querySelectorAll(".detail-item-select");
let detailImgs = document.querySelectorAll(".detail-item-img");
for (let s = 0; s < modifyBtn.length; s++) {
modifyBtn[s].addEventListener("click", (e) => {
	e.preventDefault();
	for (let i = 0; i < saveBtn.length; i++) {
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
});
}
let submitFrom = document.querySelectorAll(".submit-from");
console.log(submitFrom);
for (let s = 0; s < saveBtn.length; s++) {
saveBtn[s].addEventListener("click", (e) => {
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
	// for (let i = 0; i < detailImgs.length; i++) {
	// 	detailImgs[i].disabled = true;
	// }
	submitFrom[s].submit();
});
}
// !! back to recipe index btn
for (let s = 0; s < backToRecipeDe.length; s++) {
backToRecipeDe[s].addEventListener("click", function (e) {
	e.preventDefault();

	detailPage[s].classList.add("invisible");
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
});
}
for (let s = 0; s < detailXMark.length; s++) {
detailXMark[s].addEventListener("click", function (e) {
	detailPage[s].classList.add("invisible");
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
});
}

// 

// let submitImg = document.querySelectorAll(".submit-img");
// for(let s=0; s<submitFrom.length; s++){
// 	submitImg[s].addEventListener("click",function(){
		
// 	})
	
// 	}

// update image
let avatarImg = document.querySelectorAll(".avatar-img");
console.log(avatarImg);
let inputImg = document.querySelectorAll(".detail-input-img");
console.log(inputImg);

let fileSvg = document.querySelectorAll(".file-svg");
for(let s=0; s<inputImg.length; s++){
	inputImg[s].addEventListener("change",function(){
		avatarImg[s].classList.remove("d-none");
		fileSvg[s].classList.add("d-none");

		let fileName=this.files[0].name;
		console.log(fileName);
		if(fileName){
			avatarImg[s].src=`img/user_img/${fileName}`	;
		}
		console.log(avatarImg[s].src=`img/user_img/${fileName}`);
			
})
}

//perpage
let selectBtn = document.querySelector(".select-pages-btn");
let selectForm = document.querySelector(".form-search");
selectBtn.addEventListener("change",function(){
	selectForm.submit();
})




