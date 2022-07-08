//perPage onchange
let perPage = document.querySelector(".per-page");
let searchForm = document.querySelector(".recipe_search");
perPage.addEventListener("change", function () {
	searchForm.submit();
});

//filter star
let filter_stars = document.querySelectorAll(".evaluation");
for (let i = 0; i < filter_stars.length; i++) {
	filter_stars[i].addEventListener("mouseover", function () {
		for (let j = 0; j <= i; j++) {
			filter_stars[j].classList.add("evaluation-hover");
		}
	});
	filter_stars[i].addEventListener("mouseout", function () {
		for (let j = 0; j <= i; j++) {
			filter_stars[j].classList.remove("evaluation-hover");
		}
	});
}

//print stars
let tableStars = document.querySelectorAll(".table-stars");
for (let i = 0; i < tableStars.length; i++) {
	let stars = parseInt(tableStars[i].innerText);
	let star = `<i class="fa-solid fa-star table-evaluation"></i>`;
	result = "";
	for (let j = 0; j < stars; j++) {
		result += star;
	}
	tableStars[i].innerHTML = result;
}
