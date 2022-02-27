const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const base_url = document.body.dataset.baseurl;
const commentsDiv = document.querySelector(".comment__container"); 
const textarea = document.getElementById("comment-text");
const addComment = document.getElementById("add-comment");
const currentUserId=  localStorage.getItem("user_id");


function getComments(){
    axios.get(base_url + "/api/review/comment_list?id=" + id).then(res=>{
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
    axios.delete(base_url + "/api/review/delete?id="+commentId).then(res=>{
        getComments(id);
    });
}