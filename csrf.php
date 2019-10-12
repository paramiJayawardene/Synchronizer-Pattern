<?php
$ctokens = include 'data/csrftoken.txt';
//return the csrf token based on the session id
if(!isset($_COOKIE['session_id'])) {
    echo "Error! Please Login!";
}
else {
    echo $ctokens[$_COOKIE['session_id']];

}
?>
