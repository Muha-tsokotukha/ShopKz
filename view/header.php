
        <div class="nav">
            <div class="nav-logo">
                <?php 
                    if(isset($_SESSION["user_id"])){
                ?>
                <a href="<?=$BASE_URL?>/profile.php">
                <?php }else{
                    ?>
                <a href="<?=$BASE_URL?>/index.php">
                
                <?php }?>
                <img src="img/logo.png" alt="logo">
                </a>
            </div>
            <div class="nav-contacts">
                <p>+7 (727) 356-52-80</p>
                <p>+7 771 920-19-20</p>
                <p>Ваш город: <a href="">Алматы</a></p>
                <p><a href="">Адреса и телефоны</a></p>
            </div>
            <div class="nav-acc">
                <?php 
                    if(isset($_SESSION["user_id"])){
                ?>
                <div class="nav-acc--cabinet">
                    <p><a href="">Личный кабинет</a></p>
                    <p><a href="<?=$BASE_URL?>/api/user/signout.php">Выход</a></p>
                </div>
                <?php
                    }
                    else{
                ?>
                <div class="nav-acc--cabinet">
                    <p><a href="login.php">Вход</a> в личный кабинет</p>
                    <p><a href="reg.php">Регистрация</a></p>
                </div>
                <?php } 
                ?>

                <div class="nav-acc--basket">
                    <div>
                        <img src="img/compare.jpg" alt="1">
                        <a href="">Сравнение</a>
                    </div>
                    
                    <a href="bookmarks.php">
                            <div>
                                <img src="img/want.jpg" alt="2">
                                <a href="bookmarks.php">Желания</a>
                            </div>
                    </a>
                    
                    <div>
                        <img src="img/basket.jpg" alt="3">
                        <a href="">Корзина</a>
                    </div>
                    
                </div>    
            </div>
            
        </div>
