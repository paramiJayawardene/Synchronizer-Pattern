<?php
$csrf_tokens = include 'data/csrftoken.txt';


    if(!isset($_COOKIE['session_id']) or !isset($_COOKIE['username'])) {
        echo 'cookie is not set';
    } else {
        if(!isset($_POST["csrf_token"])){
            header("please login again");
            header("location: index.php");

        }else{
            // Validate the stored csrf token and the token sent by the client
            if($csrf_tokens[$_COOKIE['session_id']] == $_POST["csrf_token"]){
                echo "Success";

            }else{
                echo "failed, please login again.";
            }
        }
    }

?>