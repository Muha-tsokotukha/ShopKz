$('.slider').slick();


let basket = [];


let add = document.getElementsByClassName("addButton");

Array.from(add).forEach( (el)=>{
    el.addEventListener('click', (event)=>{
        let clicked = event.target;
        let id = clicked.parentElement.getElementsByClassName("id")[0].innerHTML;
        addToBasket(id);
    });
} );

function addToBasket(id){
    basket.push(id);
}

