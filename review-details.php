<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзыв</title>
    <?php 
        include "view/head.php";
        include "config/db.php";
    ?>
</head>
<body data-baseurl="<?=$BASE_URL?>">
    <main class="review-container">
        <?php
            if( isset($_GET["id"], $_GET["author_id"]) && strlen($_GET["id"]) > 0 && strlen($_GET["author_id"]) > 0){
                $review_id = $_GET["id"];
                $author_id = $_GET["author_id"];
                $prep = mysqli_prepare($con, "SELECT * FROM reviews r LEFT OUTER JOIN users u ON u.id=r.author_id WHERE r.author_id=? AND r.id=?"); 
                mysqli_stmt_bind_param($prep, "ii", $author_id,$review_id);
                mysqli_stmt_execute($prep);
                $query = mysqli_stmt_get_result($prep);

                if(mysqli_num_rows($query) > 0 ) {
                    $row = mysqli_fetch_assoc($query)
                    
                ?>
                    <section class="review-comments">
                        <div class="review-text__author">
                            <h1><?=$row["text"]?></h1>
                            <span class="review-author"><?=$row["name"]?></span>
                        </div>
                    </section>
                
                <?php 
                    $prep = mysqli_prepare($con, "SELECT c.*,u.name FROM comments c LEFT OUTER JOIN users u ON u.id=c.author_id WHERE c.review_id=?");
                    mysqli_stmt_bind_param($prep, "i",$review_id);
                    mysqli_stmt_execute($prep);
                    $query_comms = mysqli_stmt_get_result($prep);
                    if( mysqli_num_rows($query_comms) > 0 ){
                        while($row_com = mysqli_fetch_assoc($query_comms)){
                ?>
                <div class="comment__container">
                    
                </div>
                <?php
                    }}}}
                    if( isset($_SESSION["user_id"]) ){
                ?>
                <div class="add_comment">
                    <input type="text" name="text" id="comment-text">
                    <button type="submit" id="add-comment">Опубликовать</button>
                </div>
                <?php }?>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js"></script>
	<script src="<?=$BASE_URL?>/js/review_comments.js"></script>
</body>
</html>