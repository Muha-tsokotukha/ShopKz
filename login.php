<!DOCTYPE html>
<html lang="en">
<head>
    <?php       
        include "view/head.php";
    ?>
    <title>Вход</title>
</head>
<body>
<section class="container">
            <?php 
                include 'view/header.php';
            ?>

            <div class="container-reg">
                <h1>Вход</h1>
                <form action="api/user/signin.php" method="POST">

                    <input type="text" name="email" placeholder="Почта">
                    
                    <input type="password" name="password" placeholder="Пароль">
                    
                    <button type="submit">Войти</button>

                </form>
            </div>
            
    </section>
    <?php include "view/footer.php"; ?>
</body>
</html>