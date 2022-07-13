let inputs = document.querySelectorAll(".product-input");
let modifyBtn = document.querySelector(".modify-btn");
let saveBtn = document.querySelector(".save-btn");

modifyBtn.addEventListener("click", function (e) {
	e.preventDefault();
	modifyBtn.classList.add("d-none");
	saveBtn.classList.remove("d-none");
	for (let i = 0; i < inputs.length; i++) {
		inputs[i].removeAttribute("readonly");
		// inputs[i].classList.remove("form-control-plaintext");
		inputs[i].classList.add("form-modify");
	}
});

saveBtn.addEventListener("click", function (e) {
	// e.preventDefault();
	modifyBtn.classList.remove("d-none");
	saveBtn.classList.add("d-none");
	for (let i = 0; i < inputs.length; i++) {
		inputs[i].setAttribute("readonly", "readonly");
		// inputs[i].classList.remove("form-control-plaintext");
		inputs[i].classList.remove("form-modify");
	}
});
