<!DOCTYPE html>
<html lang="en">
<head>
    <?php     
        include "view/head.php";
    ?>
    <title>Регистрация</title>

</head>
<body>
    <section class="container">
            <?php 
                include 'view/header.php';
            ?>

            <div class="container-reg">
                <h1>Регистрация</h1>
                <form action="api/user/signup" method="POST">

                    <input type="text" name="name" placeholder="Имя">
                    <input type="text" name="second_name" placeholder="Фамилия">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="number" placeholder="Мобильный телефон">
                    <input type="password" name="password1" placeholder="Пароль">
                    <input type="password" name="password2" placeholder="Подтверждение пароля">                    
                    
                    <button type="submit">Регистрация</button>

                </form>
            </div>
            
    </section>
    <?php include "view/footer.php"; ?>
</body>
</html>