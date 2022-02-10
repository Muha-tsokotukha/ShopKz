<?php
    include "../../config/db.php";
    include "../../config/base_url.php";

    if(isset($_POST["id"]) && strlen($_POST["id"]) > 0 && 
    isset($_POST["name"]) && strlen($_POST["name"]) > 0 &&
    isset($_POST["make"]) &&
    strlen($_POST["make"]) > 0 &&     isset($_POST["cost"]) &&
    strlen($_POST["cost"]) > 0 )
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $make = $_POST["make"];
        $cost = $_POST["cost"];
        
        if(isset($_FILES["image"]) && isset($_FILES["image"]["name"]) && strlen($_FILES["image"]["name"]) > 0) {
            
            $query = mysqli_query($con, "SELECT img FROM products WHERE id=$id");
            if(  mysqli_num_rows($query) >  0 ){
                $row = mysqli_fetch_assoc($query);
                $old_path = __DIR__ . "/../../".$row["img"];
                if(file_exists($old_path)){
                    unlink($old_path);
                }
            }
            
            $ext = end(explode(".",$_FILES["image"]["name"]));
            $image_name = time().".".$ext;
            move_uploaded_file($_FILES["image"]["tmp_name"],"../../img/products/$image_name" );

            
            $path = "/img/products/".$image_name ;
            $prep = mysqli_prepare($con, "UPDATE products set  name=?, make=?,img=?,cost=? where id=$id");
            mysqli_stmt_bind_param($prep,"sssi", $name, $make,$path,$cost);
            mysqli_stmt_execute($prep);
        }
        else{
            $prep = mysqli_prepare($con,"UPDATE products set  name=?, make=?,cost=? where id=$id");
            mysqli_stmt_bind_param($prep,"ssi", $name, $make, $cost );
            mysqli_stmt_execute($prep);
        }
        

        header("Location: $BASE_URL/profile.php");
    }else{
        header("Location: $BASE_URL/admin.php?id=".$_POST["id"]."&error=3");
    }
?>
