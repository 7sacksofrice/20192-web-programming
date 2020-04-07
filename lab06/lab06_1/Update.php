<html>
    <head>
        <title>Product Update</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <font size='5' color='blue'>Select Product to Update</font><br>
        <form action="" method="POST">
            Enter product to search for: <br>
            Hammer: <input type="radio" name="Product" value="Hammer">
            ScrewDriver: <input type="radio" name="Product" value="ScrewDriver">
            Wrench: <input type="radio" name="Product" value="Wrench">
            <br>
            <input type="submit" value="Submit">
        </form>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'sale';
$table_name = 'Products';

$connect = mysqli_connect($server, $user, $pass);

$Product = filter_input(INPUT_POST, 'Product');

if( !$connect ) {    die("Cannot connect to $server using $user" ); }
else {
    print "<font size='5' color='blue'>Update Result for $table_name</font>";
    $SQLcmd = "UPDATE $table_name SET Numb = Numb - 1 WHERE (Product_desc = '$Product');";
    
    print "<br>The query is <i>$SQLcmd</i><br>";
    
    if ( !mysqli_select_db($connect, $mydb) ) {
        echo "Unable to select $mydb";
        exit();
    }
    
    mysqli_query($connect, $SQLcmd);
    show_all($connect, $table_name);
    
    mysqli_close($connect);
}

function show_all($link, $table_name) {
    $query = "SELECT * FROM $table_name";
    $result = mysqli_query($link, $query);
//    print_r($result);

    if ( $result ) {
        print '<table border=1>'
        . '<th>Num</th><th>Product</th><th>Cost</th><th>Weight</th><th>Count</th>';
    
        while ($row = mysqli_fetch_row($result) ) {
        print '<tr>';
        
        foreach ($row as $field) {
            print "<td>$field</td>";
        }
        
        print '</tr>';
    }    } else {
        die("Process Failed");
    }
    
}
?>
    </body>
</html>
