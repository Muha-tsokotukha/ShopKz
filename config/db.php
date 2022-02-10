<?php 

    $con = mysqli_connect("localhost","root", "just2good2betrue","belyiveter");

    if( mysqli_connect_errno() ){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

?>