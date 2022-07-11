//collect-page
let collectPage=document.getElementsByClassName("collect-page");
let collectType=document.getElementsByClassName("collect-type");
collectPageIdx=1;
collectPage[collectPageIdx].style.display="none";

for(let s=0; s<collectType.length; s++){        
    collectType[s].addEventListener("click",collectClick);
}

function collectClick(){
    // console.log("click");
   for(let i=0; i<collectType.length; i++){ 
      collectType[i].classList.remove("button-pattern");
      collectPage[i].style.display="none";
}
      this.classList.add("button-pattern");
      collectPageIdx=Number(this.id.substr(1));
    //   console.log(collectPageIdx);
      collectPage[collectPageIdx-1].style.display="flex";
}


//collect-icon
let collectIcon = document.querySelectorAll(".collect-icon");
let heartIcon = document.querySelectorAll(".fa-heart");
for(let s=0; s<collectIcon.length; s++){
	collectIcon[s].addEventListener("mouseover",function(){
		// console.log("click");
		heartIcon[s].style.color="black";
	})
}
for(let s=0; s<collectIcon.length; s++){
	collectIcon[s].addEventListener("mouseout",function(){
		// console.log("out");
		heartIcon[s].style.color="red";
	})
}


//add-collect-button
let addPlus = document.querySelectorAll(".add-plus");
let addCollectPage = document.querySelectorAll(".add-collect-page");
let addCloseBtn = document.querySelectorAll(".add-close-btn");

for(let s=0; s<addPlus.length; s++){
	addPlus[s].addEventListener("click",function(){
		// console.log("click");
		addCollectPage[s].classList.remove("invisible");
	})
}
for(let s=0; s<addCloseBtn.length; s++){
	addCloseBtn[s].addEventListener("click",function(){
		// console.log("click");
		addCollectPage[s].classList.add("invisible");
	})
}