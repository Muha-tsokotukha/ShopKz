<?php 
    include "../../config/base_url.php";
    include "../../config/db.php";
    $data = json_decode(file_get_contents('php://input'), true);
    session_start();
    if( isset($_SESSION["user_id"], $data["text"] ) && strlen($data["text"] ) > 0 ){

        $user_id = $_SESSION["user_id"]; 
        $text = $data["text"];

        $prep = mysqli_prepare($con, "INSERT INTO reviews (author_id, text) values(?,?)" );
        mysqli_stmt_bind_param($prep, "is", $user_id,$text);
        mysqli_stmt_execute($prep);

        $query = mysqli_query($con, "SELECT r.*,u.name FROM reviews r LEFT OUTER JOIN users u ON u.id=r.author_id");

        if( mysqli_num_rows($query) > 0 ){
            $row = mysqli_fetch_assoc($query);
            echo json_encode($row);
        }
    }else{
        echo json_encode("error");
    }
?>