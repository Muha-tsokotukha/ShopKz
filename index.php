<!DOCTYPE html>
<html lang="en">
<head>

    <?php include 'view/head.php'; 
        include 'config/base_url.php';
        include 'config/db.php';
    ?>

    <title>Белый Ветер</title>
</head>
<body data-baseurl="<?=$BASE_URL?>">
    <section class="container">
        <?php 
            include 'view/header.php';
            include 'view/page.php';
            include 'view/prods.php';
            include "common/time_ago.php";
        ?>
    </section>
    <?php include "view/footer.php"; ?>
    
    <button class="review__button">Отзывы</button>

    <?php include "view/reviews.php"; ?>
    <script src="<?=$BASE_URL?>/js/isActive.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="script/basket.js"></script>
</body>
</html>