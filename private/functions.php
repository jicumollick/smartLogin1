<?php


function get_random_string($length){
    $text = "";
    if($length < 5){
        $length = 5;
    }

    $len = rand(4,$length);
    for ($i=0; $i < $len; $i++) { 
        # code...
        $text .=rand(0,9);
    }
    return $text;

}

function esc($word){
    return addslashes($word);
}

function check_login($connection){
    if(isset($_SESSION['url_address'])){

    $arr['url_address'] = $_SESSION['url_address'];

        //  $query = "insert into users (url_address,username,password,email,date) values ('$url_address','$username','$password','$email','$date')";
 
    $query = "SELECT * FROM users WHERE url_address = :url_address  limit 1";

    $stm= $connection->prepare($query);

    $check = $stm->execute($arr);

    if($check){
        $data = $stm->fetchAll(PDO::FETCH_OBJ);

        if(is_array($data)){

           return  $data[0];
           

        }
        

    }

    }else{

        header('location: login.php');
        die();

    }
   
}
?>