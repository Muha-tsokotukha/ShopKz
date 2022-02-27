
        <div class="mainPage">
            <div class="mainPage-categories">
                <div class="mainPage-categories--header">Каталог товаров <p>&#9660;</p></div>
                
                <?php 
                    $query = mysqli_query($con, "SELECT * FROM categories");
                    while($row = mysqli_fetch_assoc($query)){
                        echo "<div class='mainPage-categories--item'><a href='$BASE_URL/profile?category_id=".$row['id']."'>".$row['name']."</a></div>";
                    }
                ?>
                
                <div class="mainPage-categories--item"><a href="">Оргтехника и расходные материалы</a></div>
                <div class="mainPage-categories--item"><a href="">Сетевое и серверное оборубование</a></div>
                <div class="mainPage-categories--item"><a href="">Телевизоры, аудио, фото, видео</a></div>
                <div class="mainPage-categories--item"><a href="">Бытовая техника и товары для дома</a></div>
                <div class="mainPage-categories--item"><a href="">Товары для геймеров</a></div>
                <div class="mainPage-categories--item"><a href="">Развлечения и отдых</a></div>
                
            </div>

    
            <div class="mainPage-info">

                <div class="mainPage-info--nav">
                    <p><a href="">Доставка</a></p>
                    <p><a href="">Оплата</a></p>
                    <p><a href="">Гарантия надёжности</a></p>
                    <span>Купить дешевле&#9660;</span>
                    
                    <form class="nav-search" method="GET">
                        <input name="page" value="1" type="hidden">
                        <input name="q" type="text" placeholder="Поиск по товарам">
                        <img src="img/search.png" alt="">
                    </form>
                </div>

                <div class="slider">
                    <div class="slider-item">
                        <img src="img/videocard.jpg"  >
                    </div>
                    <div class="slider-item">
                        <img src="img/vivo.jpg"  >
                    </div>
                    <div class="slider-item">
                        <img src="img/laptop.jpg"  >
                    </div>
                    <div class="slider-item">
                        <img src="img/msi.jpg"  >
                    </div>                    
                </div>
            
                <div class="mainPage-info--features">
                    <a href="" class="mainPage-info--features---item">
                        <img src="img/delivery.jpg" alt="car">
                        <p>Доставка по всему Казахстану</p>
                    </a>
                    <a href="" class="mainPage-info--features---item">
                        <img src="img/help.jpg" alt="car">
                        <p>Поддержка 7 дней в неделю</p>
                    </a>
                    <a href="" class="mainPage-info--features---item">
                        <img src="img/bonus.jpg" alt="car">
                        <p>Накопительная бонусная система</p>
                    </a>
                    <a href="" class="mainPage-info--features---item">
                        <img src="img/takepay.jpg" alt="car">
                        <p>Оплата наличными при получении</p>
                    </a>
                            
                    
                </div>
                

            </div>

            
    
        </div>
