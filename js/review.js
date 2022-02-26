const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const base_url = document.body.dataset.baseurl;
const commentsDiv = document.querySelector(".comment__container"); 
const textarea = document.getElementById("comment-text");
const addComment = document.getElementById("add-comment");
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


function getComments(){
    axios.get(base_url + "/api/review/comment_list.php?id=" + id).then(res=>{
        showComments(res.data);
    });
}

function showComments(comments){
    let commentsHTML = ``;
    let deleteBtn = ``;
    for(let i = 0; i < comments.length; i++){
        
        if( currentUserId == comments[i].author_id ){
            deleteBtn= `<span class="deleteBtn" onclick='removeComment(${comments[i].id})'> Удалить </span>`; 
        }
        commentsHTML += `
        <div class="comment">
            <div>
                <h1 class="comment__author">${comments[i].name}</h1>
                <p  class="comment__content">${comments[i].text}</p>
            </div>
            ${deleteBtn}
        </div>
        `;
    }
    commentsDiv.innerHTML = commentsHTML;
}

getComments();


addComment.addEventListener('click', ()=>{

    axios.post(base_url + "/api/review/comment_add.php", {
        text: textarea.value,
        review_id: id
    }).then(res=>{
        getComments(id);
        textarea.value="";
    })
});


function removeComment(commentId){
    axios.delete(base_url + "/api/review/delete.php?id="+commentId).then(res=>{
        getComments(id);
    });
}