<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'view/head.php'; 
        include 'config/base_url.php';
        include 'config/db.php';
    ?>
    <title>More about product</title>
</head>
<body>
    <section class="container">
        <?php 
            include 'view/header.php';

            $id = $_GET["id"];
            $name = "";
            $make = "";
            $img_path = "";
            $price = "";
            $query = mysqli_query($con,"SELECT * FROM products WHERE id=$id" );
            if( mysqli_num_rows($query) > 0  ){
                $row = mysqli_fetch_assoc($query);
                $name = $row["name"];
                $make = $row["make"];
                $cost = $row["cost"];
                $img_path = $row["img"];
            }else{
                header("Location: $BASE_URL/profile.php");
            }
        ?>

        <hr>
        <div class="moreProduct">
            <div class="moreProduct-name"><?=$name?>,<?=$make?></div>
            <div class="moreProduct-container">
                <div>
                    <img src="<?=$BASE_URL?><?=$img_path?>" alt="">
                </div>
                <div>
                    <p><?=$cost?>$</p>
                    <a href="<?=$BASE_URL?>/api/admin/delete.php?id=<?=$id?>"><button class="danger" type="submit">Купить</button></a>
                    
                </div>
            </div>


        </div>


    </section>
    <?php include "view/footer.php"; ?>
</body>
</html>