<!DOCTYPE html>
<html>
    <head><title>Front Door</title></head>
    <?php
    session_start();
    $bg = $_SESSION['bg'];
    $fg = $_SESSION['fg'];
    ?>
    <body bgcolor="<?php echo $bg ;?>" text="<?php echo $fg ;?>">
    <h1>Welcome to the store</h1>

    <p>We have many fine products for you to view. 
        Please feel free to browse the aisles and stop an assistant at any time. 
        But remember, you break it you brought it!</p>

    <p>Would you like to <a href="PrefSelection.html">change your preferences?</a></p>

    </body>
</html>