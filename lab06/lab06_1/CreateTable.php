<html><head><meta charset="UTF-8">
<title>Create Table</title></head>
<body>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'sale';
$table_name = 'Products';

// highlight
$connect = mysqli_connect($server, $user, $pass);

if( !$connect ) {    die("Cannot connect to $server using $user" ); }
else {
    $SQLcmd = "CREATE TABLE $table_name ("
            . "ProductID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,"
            . "Product_desc VARCHAR(50),"
            . "Cost INT, Weight INT, Numb INT )";
    
//    $SQLcmd2 = "SHOW DATABASES";
//    if ( $result = mysqli_query($connect, $SQLcmd2) ) {
//        print_r (mysqli_use_result( $result) );
//    }
    
    if ( !mysqli_select_db($connect, $mydb) ) {
        echo "Unable to select $mydb";
        exit();
    }
    if ( mysqli_query($connect, $SQLcmd) ) {
        print "<font size=4 color='blue'>Created Table "
        . "<i>$table_name</i> in database <i>$mydb</i><br></font>"
        . "<br>SQLcmd=$SQLcmd";    
    } else {
        die("Table Creating Process Failed: SQLcmd=$SQLcmd");
    }
    
    mysqli_close($connect);
}
?>
</body></html>
