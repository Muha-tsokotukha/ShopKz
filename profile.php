<!DOCTYPE html>
<html lang="en">
<head>

    <?php include 'view/head.php'; 
        include 'config/base_url.php';
        include 'config/db.php';
        include "common/time_ago.php";
    ?>

    <title>Белый Ветер</title>
</head>
<body data-baseurl="<?=$BASE_URL?>">
    <section class="container">
        <?php 
            include 'view/header.php';
            include 'view/page.php';
            // session_start();
            if(!isset($_SESSION["user_id"])){
                header("Location: $BASE_URL/reg");
            }
            include 'view/prods.php';
            
        ?>

    </section>

    <?php include "view/footer.php"; ?>
    <button class="review__button">Отзывы</button>
    <?php include "view/reviews.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js"></script>
    <script src="js/review.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="script/basket.js"></script>
</body>
</html>