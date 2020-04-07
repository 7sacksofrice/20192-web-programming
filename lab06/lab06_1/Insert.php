<html><head><meta charset="UTF-8">
<title>Insert Results</title></head>
<body>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'sale';
$table_name = 'Products';

//print_r($_POST);

$Item =filter_input(INPUT_POST, 'Item');
$Cost =filter_input(INPUT_POST, 'Cost');
$Weight =filter_input(INPUT_POST, 'Weight');
$Quantity =filter_input(INPUT_POST, 'Quantity');
//$Cost = $_POST['Cost'];
//$Weight = $_POST['Weight'];
//$Quantity = $_POST['Quantity'];

// highlight
$connect = mysqli_connect($server, $user, $pass);

if( !$connect ) {    die("Cannot connect to $server using $user" ); }
else {
    $SQLcmd = "INSERT INTO $table_name VALUES"
            . "('0', '$Item', '$Cost', '$Weight', '$Quantity' );";
    
    print "The query is $SQLcmd<br>";
//    $SQLcmd2 = "SHOW DATABASES";
//    if ( $result = mysqli_query($connect, $SQLcmd2) ) {
//        print_r (mysqli_use_result( $result) );
//    }
    
    if ( !mysqli_select_db($connect, $mydb) ) {
        exit("Unable to select $mydb");
    }
    if ( mysqli_query($connect, $SQLcmd) ) {
        print "Insert into $mydb was successful!";
    } else {
        die("Table Inserting Process Failed: SQLcmd=$SQLcmd");
    }
    
    mysqli_close($connect);
}
?>
</body></html>
