<html>
 <head><title> Personal Information </title> </head>
 <body>
 <?php
    $name = $_POST["name"];
    $class = $_POST["class"];
    $uni = $_POST["uni"];
    print("Hello, $name<br>You are studying at $class, $uni<br>");
    
    $hobby = [];
    
    if($_POST["soccer"] == 1) { array_push($hobby, "Playing Soccer") ; }
    if($_POST["film"] == 1) { array_push($hobby, "Watching Films") ; }
    if($_POST["music"] == 1) { array_push($hobby, "Listening to Music") ; }
//    print_r(explode(",", $_POST["other"]));
    if(!empty($_POST["other"])) {      $hobby = array_merge($hobby, explode(",", $_POST["other"])) ;}
    
    print("Your hobby is<br>");
    print '<ol> ';
    
    for($i = 0; $i < count($hobby); $i++) {
        $item = $hobby[$i];
        print '<li>'. $item . '</li>';
    }
    print '</ol> ';
//    print_r($hobby);
 ?>
</html>