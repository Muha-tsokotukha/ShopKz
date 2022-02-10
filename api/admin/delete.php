<?php 
    session_start();
    include "../../config/base_url.php";
    include "../../config/db.php";
    if( isset($_GET["id"]) ){
        $id = $_GET["id"];

        $query = "DELETE FROM products WHERE `id`=$id";
        $action = mysqli_query($con, $query);
        
        $query = "DELETE FROM bookmark WHERE item_id=$id AND user_id=".$_SESSION["user_id"];
        $action = mysqli_query($con, $query);
        
        header("Location: $BASE_URL/profile.php");
    }
    header("Location: $BASE_URL/profile.php");

?>