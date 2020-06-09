<?php
$color = array(
    'black' => '#000000',
    'white' => '#ffffff',
    'red' => '#ff0000',
    'blue' => '#0000ff'
);

print_r($_POST);
$bg_name = $_POST['background'];
$fg_name = $_POST['foreground'];

session_start();
$_SESSION['bg'] = $color[$bg_name]; 
$_SESSION['fg'] = $color[$fg_name]; 

// setcookie('bg', $color[$bg_name]);
// setcookie('fg', $color[$fg_name]);
?>
<html>
    <head><title>Preferences Set</title></head>
    <body>
        Thank you. Your preferences have been changed to: <br/>
        Background: <?php echo $bg_name; ?><br/>
        Foreground: <?php echo $fg_name; ?><br/>

        Click <a href="prefs-demo.php">here</a> to see the preferences in action.
    </body>
</html>