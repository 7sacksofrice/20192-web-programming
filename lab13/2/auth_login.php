<html><head><meta charset="UTF-8">
<title>Processing...</title></head>
<body>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'foo';
$table_name = 'users';

// highlight
$connect = mysqli_connect($server, $user, $pass);

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

// connect to server unsuccessfully -> terminate
if( !$connect ) {    die("Cannot connect to $server using $user" ); }
else {
    // Successfully connect to server
    
    // connect to database
    if ( !mysqli_select_db($connect, $mydb) ) {
        echo "Unable to select $mydb";
        exit();
    }
    
    $SQLcmd = "SELECT * FROM $table_name WHERE (username = '$username' AND password = '$password')";
    
    $SQLcmd = "SELECT EXISTS(" . $SQLcmd . ");";
    // print "<br>The query is <i>$SQLcmd</i><br>";
    
    $result = mysqli_query($connect, $SQLcmd);
    
    $is_user_auth = 0;
    // print_r($result);
    if ( $result ) {
        while ($row = mysqli_fetch_row($result) ) {
            // print "<tr>";
            foreach ($row as $field) {
                // print "<td>$field</td>";
                $is_user_auth = $field;
            }
            // print "</tr>";
        }
    } else {
        die("Process Failed: SQLcmd=$SQLcmd");
    }
    
    // close connection
    mysqli_close($connect);

    switch ($is_user_auth) {
        case 0:
            print("<p style='color:red; font-size:40px'>ERROR!</p>");
            break;
        case 1:
            echo 'successfully login';
            session_start();
            $_SESSION['username'] = $username;

            $newURL = 'PrefSelection.html';
            header('Location: '.$newURL);
            break;

        default:
            # code...
            break;
    }
}
?>
</body></html>