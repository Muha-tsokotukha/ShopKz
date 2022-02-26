<?php 
    include "../../config/base_url.php";
    include "../../config/db.php";
    
    session_start();
    if(isset($_SESSION["user_id"], $_GET["id"])  )
    {
        $user_id = $_SESSION["user_id"];
        $id = $_GET["id"];
        
        $prep = mysqli_prepare($con, "SELECT * FROM bookmark WHERE item_id=? AND user_id=? ");
        mysqli_stmt_bind_param($prep, "ii",$id, $user_id );
        mysqli_stmt_execute($prep);
        $query = mysqli_stmt_get_result($prep);
        
        if( mysqli_num_rows($query) >= 1 ){
            header("Location: $BASE_URL/profile.php");
            exit();
        }

        $prep = mysqli_prepare($con, "INSERT INTO bookmark VALUES(?,?)");
        mysqli_stmt_bind_param($prep, "ii",$id, $user_id );
        mysqli_stmt_execute($prep);
    }
    // header("Location: $BASE_URL/profile.php");

?>