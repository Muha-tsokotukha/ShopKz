<!DOCTYPE html>
<html lang="en">
<head>

    <?php include 'view/head.php'; 
        include 'config/base_url.php';
        include 'config/db.php';
    ?>

    <title>Белый Ветер</title>
</head>
<body>
    <section class="container">
        <?php 
            include 'view/header.php';
            include 'view/page.php';
            include 'view/prods.php';
        ?>


    
    </section>
    <?php include "view/footer.php"; ?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="script/basket.js"></script>
</body>
</html>