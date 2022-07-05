let customerOpenBtn=document.querySelector("#customer-add-openBtn");
let customerCloseBtn=document.querySelector("#customer-close-btn");
// let openMsg=document.querySelector("#openMsg");
let customerMain=document.querySelector("#customer-add-main");
    
customerOpenBtn.addEventListener("click",function(){
    customerMain.classList.remove("close");
    console.log("aaa");
      
    })

customerCloseBtn.addEventListener("click",function(){
    customerMain.classList.add("close");
    
    

    })