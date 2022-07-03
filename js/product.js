let navDropBtns = document.querySelectorAll(".nav_dropdown");
let subNavContainer = document.querySelectorAll(".sub_nav_item_container");
let mainNavItems = document.querySelectorAll(".main_nav_item");
let subNavItems = document.querySelectorAll(".sub_nav_item_container li");
// navbar animation ------------------------------------------------------------
for (let i = 0; i < mainNavItems.length; i++) {
    mainNavItems[i].addEventListener("click", function () {
        for (let j = 0; j < subNavContainer.length; j++) {
            if (!subNavContainer[j].classList.contains("translateYtoNone") && i != j) {
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

let newProductPage = document.querySelector(".new-product-page");
let addProductBtn = document.querySelector(".add-product-btn");
let backToProduct = document.querySelector(".back-product");
let cover = document.querySelector(".cover");
let xMark = document.querySelector(".fa-xmark");
let detailPage=document.querySelector(".detail-page");
let detailBtn=document.querySelector(".detail-btn");

addProductBtn.addEventListener("click", function (e) {
    e.preventDefault();
    newProductPage.classList.remove("invisible");
});
backToProduct.addEventListener("click", function (e) {
    e.preventDefault();
    newProductPage.classList.add("invisible");
});
xMark.addEventListener("click", function (e) {
	newProductPage.classList.add("invisible");
});
detailBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    detailPage.classList.remove("invisible");
})