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

// add product page & detail page

let newProductPage = document.querySelector(".new-product-page");
let addProductBtn = document.querySelector(".add-product-btn");
let backProduct = document.querySelector(".back-product");
let backToProduct = document.querySelector(".back-to-product");
let cover = document.querySelector(".detail-cover");
let xMark = document.querySelector(".fa-xmark");
let detailPage=document.querySelector(".detail-page");
let detailBtn=document.querySelector(".detail-btn");

addProductBtn.addEventListener("click", function (e) {
    e.preventDefault();
    newProductPage.classList.remove("invisible");
});
backProduct.addEventListener("click", function (e) {
    e.preventDefault();
    newProductPage.classList.add("invisible");
});
backToProduct.addEventListener("click", function (e) {
    e.preventDefault();
    detailPage.classList.add("invisible");
});
xMark.addEventListener("click", function (e) {
	newProductPage.classList.add("invisible");
});
detailBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    detailPage.classList.remove("invisible");
    saveBtn.disabled=true;
    saveBtn.classList.remove("save-hover");
    reviseBtn.disabled=false;
    reviseBtn.classList.add("revise-hover");
})
cover.addEventListener("click", (e)=>{
    e.preventDefault();
    detailPage.classList.add("invisible");
})
// detail page funcition

let saveBtn=document.querySelector(".save-btn");
let reviseBtn=document.querySelector(".revise-btn");
let input=document.querySelectorAll(".product-input");

reviseBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    saveBtn.disabled=false;
    reviseBtn.disabled=true;
    reviseBtn.classList.remove("revise-hover");
    saveBtn.classList.add("save-hover");
    for (i=0;i<input.length;i++){
        input[i].removeAttribute("readonly");
        input[i].classList.remove("form-control-plaintext");
        input[i].classList.add("form-control");
        input[i].disabled=false;
    }
})
saveBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    saveBtn.disabled=true;
    reviseBtn.disabled=false;
    reviseBtn.classList.add("revise-hover");
    saveBtn.classList.remove("save-hover");
    for (i=0;i<input.length;i++){
        input[i].setAttribute("readonly", "readonly");
        input[i].classList.add("form-control-plaintext");
        input[i].classList.remove("form-control");
        input[i].disabled=true;
    }
})

// list & unlist

let listBtn=document.querySelector(".list");
let unlistBtn=document.querySelector(".unlist");

listBtn.addEventListener("click", (e)=>{
    
})