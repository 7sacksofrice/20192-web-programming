<?php
session_start();
// session_destroy(); 

if( isset($_SESSION['username']) ) {
    $newURL = 'PrefSelection.html';
    header('Location: '.$newURL);
} else {
    $newURL = 'login.php';
    header('Location: '.$newURL);
}
