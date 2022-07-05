let customerOpenBtn = document.querySelector("#customer-add-openBtn");
let customerCloseBtn = document.querySelector("#customer-close-btn");
let userAddPage = document.querySelector(".user-add-page");
// let openMsg=document.querySelector("#openMsg");
let customerMain = document.querySelector("#customer-add-main");

customerOpenBtn.addEventListener("click", function () {
	customerMain.classList.remove("close");
	userAddPage.classList.remove("d-none");
});

customerCloseBtn.addEventListener("click", function (e) {
	e.preventDefault();
	customerMain.classList.add("close");
	userAddPage.classList.add("d-none");
});
