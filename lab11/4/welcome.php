<?php
session_start();
$username = $_SESSION['username'];

// echo $username;

print("<p style='color:blue; font-size:30px'>Welcome $username...</p>");