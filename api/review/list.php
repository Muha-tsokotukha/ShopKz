<?php 
    include "../../config/base_url.php";
    include "../../config/db.php";

    session_start();

    $query = mysqli_query($con, "SELECT r.*,u.name FROM reviews r LEFT OUTER JOIN users u ON u.id=r.author_id");
    
    $reviews = array(); 
    if( mysqli_num_rows($query) > 0 ){
        while( $row = mysqli_fetch_assoc($query) ){
            $reviews[] = $row;
        }
    }
    echo json_encode($reviews);
?>