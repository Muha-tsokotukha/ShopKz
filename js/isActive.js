const button = document.querySelector(".review__button");
const container = document.querySelector(".reviews-container");
const header = document.querySelector(".reviews__header");
const input = document.querySelector(".reviews__input");
const reviews = document.querySelector(".reviews");

let isActive = false;

button.addEventListener('click', ()=>{
    if(isActive){
        isActive = false;
        container.classList.remove("active");
        header.classList.remove("active");
        input.classList.remove("active");
        reviews.classList.remove("active");
    }else{
        isActive = true;
        container.classList.add("active");
        header.classList.add("active");
        input.classList.add("active");
        reviews.classList.add("active");
    }
})