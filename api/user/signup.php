<?php 

    include '../../config/base_url.php';
    include '../../config/db.php';

    
    if( isset($_POST["name"],$_POST["second_name"],$_POST["email"],$_POST["number"],$_POST["password1"],$_POST["password2"]) 
    && strlen($_POST["name"])>0 && strlen($_POST["second_name"])>0 && strlen($_POST["email"])>0 && strlen($_POST["number"])>0 && strlen($_POST["password1"])>0 && strlen($_POST["password2"])>0   
    ){
        if($_POST["password1"] != $_POST["password2"]){
            header("Location: $BASE_URL/reg?error=5");
            exit();
        }
        
        $email = $_POST["email"];
        $name = $_POST["name"];
        $second_name = $_POST["second_name"];
        $number = $_POST["number"];
        $password = $_POST["password1"];
        
        
        $prep = mysqli_prepare($con, "SELECT id FROM users WHERE email=? OR number=?");
        mysqli_stmt_bind_param($prep,"ss", $email,$number);
        mysqli_stmt_execute($prep);
        $query = mysqli_stmt_get_result($prep);

        if(mysqli_num_rows($query)  > 0 ){
            header("Location: $BASE_URL/reg?error=6");
            exit();
        }
    
        $hash = sha1($password);
        $prep1 = mysqli_prepare($con, "INSERT INTO users (email,name,second_name,number,password) VALUES(?,?,?,?,?)");
        mysqli_stmt_bind_param($prep1,"sssss", $email,$name,$second_name,$number,$hash);
        mysqli_stmt_execute($prep1);
        
        

        header("Location: $BASE_URL/login");
    
    }
    else
    {
        header("Location: $BASE_URL/reg?error=4");
    }

?>