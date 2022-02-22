<?php 

    include "../../config/base_url.php";
    include "../../config/db.php";

    $data = json_decode(file_get_contents('php://input'), true);

    if(isset($data["text"],$data["review_id"] )  && intval($data["review_id"]) &&
    strlen($data["text"]) > 0){
        session_start();

        $text = $data["text"];
        $review_id = $data["review_id"];

        $prep = mysqli_prepare($con, "INSERT INTO comments (text,author_id,review_id) values(?,?,?)");
        mysqli_stmt_bind_param($prep, "sii",$text, $_SESSION["user_id"], $review_id );
        mysqli_stmt_execute($prep);

        $comment_id = mysqli_stmt_insert_id($prep);
        $query = mysqli_query($con, "SELECT c.*,u.name from comments c left outer join users u on u.id=c.author_id WHERE c.review_id=$comment_id");

        if( mysqli_num_rows($query) > 0 ){
            $row = mysqli_fetch_assoc($query);
            echo json_encode($row);
        }
    }
    else{
        echo "ERROR";
    }
    
?>