<html><head><meta charset="UTF-8">
<title>Table Output</title></head>
<body>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'sale';
$table_name = 'Products';

// highlight
$connect = mysqli_connect($server, $user, $pass);

$Search = filter_input(INPUT_POST, 'Search');
if( !$connect ) {    die("Cannot connect to $server using $user" ); }
else {
    print "<font size='5' color='blue'>$table_name Data</font>";
    $SQLcmd = "SELECT * FROM $table_name WHERE (Product_desc = '$Search');";
    
    print "<br>The query is <i>$SQLcmd</i><br>";
    
    if ( !mysqli_select_db($connect, $mydb) ) {
        echo "Unable to select $mydb";
        exit();
    }
    
    $result = mysqli_query($connect, $SQLcmd);
    if ( $result ) {
        print "<table border=1>";
        print "<th>Num</th><th>Product</th><th>Cost</th><th>Weight</th><th>Count</th>";
        
        while ($row = mysqli_fetch_row($result) ) {
            print "<tr>";
            foreach ($row as $field) {
                print "<td>$field</td>";
            }
            print "</tr>";
        }
    } else {
        die("Process Failed: SQLcmd=$SQLcmd");
    }
    
    mysqli_close($connect);
}
?>
</body></html>
