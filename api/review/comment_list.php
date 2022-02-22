<?php 
    include "../../config/db.php";
	include "../../config/base_url.php";

    if(!isset($_GET["id"]) || !intval($_GET["id"])){exit();}

    $id = $_GET["id"];

    $query_comments = mysqli_query($con, "SELECT c.*,u.name from comments c left outer join users u on u.id=c.author_id WHERE c.review_id=$id");
    $comments = array();

    if( mysqli_num_rows($query_comments) == 0 ){
        echo json_encode($comments);
        exit();
    }

    while($comment = mysqli_fetch_assoc($query_comments)){
        $comments[] = $comment;  
    }

    echo json_encode($comments);

?>