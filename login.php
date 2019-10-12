<?php
session_start();

$username = 'admin';
$password = 'password';

    if($_POST['username'] == $username && $_POST['pass']==$password)

    {
        //generate session id and csrf token
        $session_id = uniqid();
        $csrf_token = uniqid() . $session_id;
        $sessions[$username] = $session_id;
        $csrf_tokens[$session_id] = $csrf_token;



        //save session id and csrf token
        file_put_contents('data/sessionid.txt', '<?php return ' . var_export($sessions,true) .';');
        file_put_contents('data/csrftoken.txt', '<?php return '. var_export($csrf_tokens, true).';');

        //set sessionid and csrf
        setcookie('session_id', $session_id, time() + (86400 * 30), "/");
        setcookie('username', $username, time() + (86400 * 30), "/");

        header("location: home.php");


    }else
    {
        echo "<script>alert('Check username and password');</script>";

    }