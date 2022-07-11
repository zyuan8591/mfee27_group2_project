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

// page & count

let perPage = document.querySelector(".per-page");
let commentSearch = document.querySelector(".comment_search");

perPage.addEventListener("change", function (e) {
	commentSearch.submit();
});

let stars=document.querySelectorAll(".star");

for (let i=0;i<stars.length;i++){
	let star=`<i class="fa-solid fa-star table-evaluation"></i>`;
	let allStar=stars[i].innerText;
	result="";
	for (let m=0;m<allStar;m++){
		result+=star;
	}
	stars[i].innerHTML=result;
}

let filterStar=document.querySelector(".filter-star");
let fiveStar=document.querySelectorAll(".five-star");
result="";
for (let i=0;i<fiveStar.length;i++){

	fiveStar[i].addEventListener("mouseover", function(e){
		// console.log("c");
		for (let m=0;m<i;m++){
			fiveStar[m].classList.add("star-hover")
		}
		fiveStar[i].classList.add("star-hover")
	})
	fiveStar[i].addEventListener("mouseout", function(e){
		// console.log("c");
		for(let m=0;m<i;m++){
			fiveStar[m].classList.remove("star-hover")
		}
		fiveStar[i].classList.remove("star-hover")
	})
}