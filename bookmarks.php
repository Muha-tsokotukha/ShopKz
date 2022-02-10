<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "view/head.php";
    ?>
    <title>Желания</title>
</head>
<body>
    <section class="container">
        <?php include "view/header.php"; include "config/db.php";?>

        <br><br><br><br><br>Желания
        <hr>
        <br><br><br>
        <div class="products">
            
        <?php 
            if(!isset($_SESSION["user_id"])){
                header("Location: $BASE_URL/index.php");
                exit();
            }
            $data = mysqli_query($con,"SELECT s.* FROM products s LEFT OUTER JOIN bookmark b on s.id=b.item_id WHERE b.user_id=".$_SESSION["user_id"]);
            if( mysqli_num_rows($data) > 0 ){
                while($row = mysqli_fetch_assoc($data)){

        ?>

            <div class="products-item">
                <div>
                    <img src="<?php echo $BASE_URL.$row["img"];?>" alt="">
                </div>
                <p class="id" style="display: none;"><?=$row["id"]?></p>
                <p><?=$row["name"]?></p>
                <p><?=$row["make"]?></p>
                <p><?=$row["cost"]."$"?></p>
                <div>
                    <button class="addButton">+</button>
                    
                </div>
                <a href="<?=$BASE_URL?>/product.php?id=<?=$row["id"]?>">More</a>
                
            </div>

            <?php
            }
            }else{
            echo "У Вас еще нет желаний";
            }
            ?>

        </div>

    </section>
    <?php include "view/footer.php"; ?>
</body>
</html>