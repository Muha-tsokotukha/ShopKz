const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const base_url = document.body.dataset.baseurl;
const reviewsDiv = document.querySelector(".reviews"); 
const textarea = document.getElementById("form-review__input");
const btn = document.getElementById("form-review__btn");
const currentUserId=  localStorage.getItem("user_id");


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


function getReviews(){
    axios.get(base_url + "/api/review/list?id=" + id).then(res=>{
        showReviews(res.data);
    });
}

function showReviews(revs){
    let revsHTML = ``;
    let deleteBtn = ``;
    for(let i = 0; i < revs.length; i++){
        
        if( currentUserId == revs[i].author_id ){
            deleteBtn= `<span class="delete-review" onclick='removeComment(${revs[i].id})'> Удалить </span>`; 
        }
        revsHTML += `
        <div class="review">
            <p class="review-text">${revs[i].text}</p>
            <div class="review__div">
                <span class="review-author">${revs[i].name}</span>
                <a target="_blank" href='review-details?id=${revs[i].id}&author_id=${revs[i].author_id}'>Комментарии</a>
                ${deleteBtn}
            </div>
        </div>
        `;
    }
    reviewsDiv.innerHTML = revsHTML;
}

getReviews();


btn.addEventListener('click', ()=>{

    axios.post(base_url + "/api/review/add.php", {
        text: textarea.value,
    }).then(res=>{
        getReviews();
        textarea.value="";
    })
});


function removeComment(revId){
    axios.delete(base_url + "/api/review/review_delete?id="+revId).then(res=>{
        getReviews();
    });
}