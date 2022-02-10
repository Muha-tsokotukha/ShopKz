<?php 
        $sql = "SELECT * FROM categories";
        if(isset($_GET["category_id"]) && intval($_GET["category_id"])){
            $sql .= " WHERE id=".$_GET["category_id"];
        }
        
        $categs = mysqli_query($con, $sql);
        if( mysqli_num_rows($categs) > 0 ){
            while($categ_row = mysqli_fetch_assoc($categs)){

    ?>
        <div>
        <p style="font-size:large;color:gray;margin-top:50px;"><?=$categ_row['name']?></p>
        <hr>
        <div class="products">

            <?php 

                $data = mysqli_query($con,"SELECT * FROM products WHERE category_id=".$categ_row['id']);
                if( mysqli_num_rows($data) > 0 ){
                    while($row = mysqli_fetch_assoc($data)){

            ?>
            
                <div class="products-item">
                    
                    <img src="<?php echo $BASE_URL.$row["img"];?>" alt="">
                    <p><?=$row["name"]?></p>
                    <p><?=$row["make"]?></p>
                    <p><?=$row["cost"]."$"?></p>
                    <?php 
                        if( !isset($_SESSION["user_id"])){
                            
                    ?>
                    <button class="addButton">+</button>
                    <?php
                        } 
                        else{
                    ?>
                    <div>
                        <button class="addButton">+</button>
                        <button class="addButton">
                                <a href="api/user/bookmark.php?id=<?=$row["id"]?>" >&hearts;</a>
                        </button>
                    </div>

                    <?php }?>
                </div>
            
            <?php
                }
            }else{
                echo "No products are available";
            }
            ?>
        </div>
        </div>

    <?php 
        }}
    ?>