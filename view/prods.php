<?php 
        $limit = 9;
        $sql = "SELECT * FROM categories";
        $sql_count =  "SELECT CEIL(COUNT(*)/$limit) as total FROM";

        if(isset($_GET["category_id"]) && intval($_GET["category_id"])){
            $sql .= " WHERE id=".$_GET["category_id"];
            $sql_count .= " products WHERE category_id=".$_GET["category_id"];
            $category = $_GET["category_id"]; 

            $query_count = mysqli_query($con,$sql_count);
		    $count = mysqli_fetch_assoc($query_count);
        }

        $categs = mysqli_query($con, $sql);
        if( mysqli_num_rows($categs) > 0 ){
            while($categ_row = mysqli_fetch_assoc($categs)){

    ?>
        
            <?php 

                $page = 1; 
                $qry_prod = "SELECT * FROM products WHERE category_id=".$categ_row['id'];
                
                
                if( isset($_GET["q"]) ){
                    
                    $q =strtolower($_GET["q"]);
                    $qry_prod .= " AND LOWER(name) LIKE '%$q%' ";
                    // echo $qry_prod;
                    // OR LOWER(make) LIKE '%$q%'
                }

                if(isset($_GET["page"]) && intval($_GET["page"])){
                    $skip = ($_GET['page'] - 1) * $limit;
                    $qry_prod .= " LIMIT $skip,$limit ";
                    $page = $_GET['page']; 
                }else{
                    $qry_prod .= " LIMIT $limit";
                }


                $data = mysqli_query($con,$qry_prod);
                if( mysqli_num_rows($data) > 0 ){
                ?>
                <div class="products-wrapper">
                <p style="font-size:large;color:gray;margin-top:50px;"><?=$categ_row['name']?></p>
                <hr>
                <div class="products">
                <?php
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
            }
            ?>


            

        </div>
        

        </div>
        <?php  

            $cat_str = "";

            if(isset($category)){
                $cat_str = "&category_id=$category";
            }

            if( $page != 1 ){
                
                echo "<a class='pagination-item' href='?page=" . ($page - 1) . "$cat_str' > Prev</a>";
            }
            if( isset($count["total"]) ){
                for($i = 1; $i <= $count["total"]; $i++ ){
                    echo  "<a class='pagination-item' href='?page=$i$cat_str' >".$i. "</a>";
                }
            }
            if( isset($count["total"]) ){
                if( $page != $count['total']  )
                echo "<a class='pagination-item' href='?page=" . ($page + 1 ). "$cat_str' > Next</a>";
            }
        ?>
    <?php 
        }}
    ?>