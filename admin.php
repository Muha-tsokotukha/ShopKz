<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "config/base_url.php";
        include "config/db.php";
        include "view/head.php";
    ?>
    <title>Admin</title>
</head>
<body>
    <section class="container">
        Add
        <form action="<?=$BASE_URL?>/api/admin/add" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" >
            <input type="text" name="make" >
            <input type="text" name="cost" >
            <input type="file" name="image">
            <select name="category_id" id="">
                <?php 
                    $query = mysqli_query($con,"SELECT * FROM categories"); 
                    while($row = mysqli_fetch_assoc($query)){
                        echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                    }
                ?>
                
            </select>
            <button type="submit">Сохранить</button>    
        </form>
        <hr>
        Update
        <form action="<?=$BASE_URL?>/api/admin/update" method="POST" enctype="multipart/form-data">
            <input type="text" name="id" >
            <input type="text" name="name" >
            <input type="text" name="make" >
            <input type="text" name="cost" >
            <input type="file" name="image">
            <button type="submit">Сохранить</button>    
            <select name="" id="">
                <option value="">smartphones</option>
                <option value="">laptops</option>
                <option value="">TVs</option>
                <option value="">headphones</option>
            </select>
        </form>
        <hr>
        

    </section>
</body>
</html>