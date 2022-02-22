<?php 
    include "../../config/base_url.php";
    include "../../config/db.php";
    session_start();
    if( isset($_SESSION["user_id"], $_POST["text"] ) && strlen($_POST["text"] ) > 0 ){

        $user_id = $_SESSION["user_id"]; 
        $text = $_POST["text"];

        $prep = mysqli_prepare($con, "INSERT INTO reviews (author_id, text) values(?,?)" );
        mysqli_stmt_bind_param($prep, "is", $user_id,$text);
        mysqli_stmt_execute($prep);

        header("Location: $BASE_URL");

    }else{
        header("Location: $BASE_URL");
    }
?>