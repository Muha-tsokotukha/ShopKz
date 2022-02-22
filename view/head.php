<?php   
    include "config/base_url.php";  
    session_start();
?> 
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

<script>
    <?php 
        if( isset($_SESSION["user_id"]) ){ ?>
            localStorage.setItem("user_id", <?=$_SESSION["user_id"]?> );
        <?php }
        else{
        ?>
            if(localStorage.getItem("user_id"))localStorage.removeItem("user_id");
        <?php }?>
</script>