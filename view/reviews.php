<aside class="reviews-container">

    <h1 class="reviews__header">Ваши отзывы и предложения</h1>
    <form action="<?=$BASE_URL?>/api/review/add.php" method="POST" class="reviews__input">
        <input name="text" type="text" placeholder="Ваш отзыв">
        <button type="submit">Сохранить</button>
    </form>
    <section class="reviews">
    <?php 
        $query = mysqli_query($con, "SELECT r.*,u.name FROM reviews r LEFT OUTER JOIN users u ON u.id=r.author_id");
        
        if( $query && mysqli_num_rows($query) > 0 ) {
            while( $row = mysqli_fetch_assoc($query) ){
                
    ?>
        <div class="review">
            <p class="review-text"><?=$row["text"]?></p>
            <div class="review__div">
                <span class="review-author"><?=$row["name"]?></span>
                <a target="_blank" href="review-details.php?id=<?=$row["id"]?>&author_id=<?=$row["author_id"]?>">Комментарии</a>
                <span><?php echo to_time_ago(strtotime($row["time"])); ?></span>
            </div>
        </div>
    <?php 
        }}else{
            echo "No reviews yet";
        }
    ?>
    </section>
</aside>