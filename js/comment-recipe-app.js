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

// call detail page
// let detailPage = document.querySelectorAll(".recipe-datail");
// let detailBtn = document.querySelectorAll(".detail");
// let detailCover = document.querySelector(".cover-detail");
// let backToRecipeDe = document.querySelectorAll(".back-recipe-de");
// let detailXMark = document.querySelectorAll(".detail-xMark");

// for (let i = 0; i < detailBtn.length; i++) {
// 	detailBtn[i].addEventListener("click", (e) => {
// 		e.preventDefault();
// 		detailPage[i].classList.remove("invisible");
// 	});
// }

// //detail page img
// let modifyImg = document.querySelectorAll(".detail-file");
// let detailImg = document.querySelectorAll(".detailImgPre");

// for (let i = 0; i < modifyImg.length; i++) {
// 	modifyImg[i].addEventListener("change", (e) => {
// 		let file = modifyImg[i].files[0].name;
// 		if (file) {
// 			detailImg[i].src = `img/recipe_img/${file}`;
// 		}
// 	});
// }
