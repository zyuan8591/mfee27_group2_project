let navDropBtns = document.querySelectorAll(".nav_dropdown");

let subNav = document.querySelectorAll(".sub_nav_item");
let subNavContainer = document.querySelectorAll(".sub_nav_item_container");
let mainNavItems = document.querySelectorAll(".main_nav_item");
let mainNavItemsContent = document.querySelectorAll(".main_nav_item_content");

for (let i = 0; i < mainNavItems.length; i++) {
	mainNavItems[i].addEventListener("click", function () {
		navDropBtns[i].classList.toggle("nav_dropdown_active");
		subNavContainer[i].classList.toggle("translateYtoNone");
	});
}
