<?php 
    include "../../config/base_url.php";
    include "../../config/db.php";
    if( isset($_POST["name"],$_POST["make"],$_POST["cost"],$_POST["category_id"]) && strlen($_POST["name"]) > 0 && strlen($_POST["make"]) > 0 && strlen($_POST["cost"]) > 0 && intval($_POST["category_id"]) ){
        
        $cat_id = $_POST["category_id"];
        $name = $_POST["name"];
        $make = $_POST["make"];
        $cost = $_POST["cost"];


        if(isset($_FILES["image"]) && isset($_FILES["image"]["name"]) && strlen($_FILES["image"]["name"]) > 0) {
            $ext = end(explode(".",$_FILES["image"]["name"]));
            $image_name = time().".".$ext;
            move_uploaded_file($_FILES["image"]["tmp_name"],"../../img/products/$image_name" );

            
            $path = "/img/products/".$image_name ;

            $query = "INSERT INTO products (name,make,cost, img,category_id) VALUES(?,?,?,?,?)";

            $prep = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($prep,"ssisi", $name, $make,$cost,$path, $cat_id);
            mysqli_stmt_execute($prep);
        }
        else{
            $query = "INSERT INTO products (name,make,cost,category_id) VALUES(?,?,?,?)";

            $prep = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($prep, "ssii",$name, $make, $cost, $cat_id);
            mysqli_stmt_execute($prep);

        }
        
        header("Location: $BASE_URL/index.php");
    }
    header("Location: $BASE_URL/index.php");

?>