<html>
    <head><title>Category Administration</title></head>
    <body>
        <font size="8"><b>Category Administration</b></font>
        <br>
<?php
$server = 'localhost';
session_start();

$user = $_SESSION['username'];
$pass = $_SESSION['password'];
$mydb = 'business_service';
$table_name = 'categories';

// Connect to the database
$connect = mysqli_connect($server, $user, $pass);
// Exit if unable to connect
if( !$connect ) {    die("Cannot connect to $server using $user" ); }

// Select database
if ( !mysqli_select_db($connect, $mydb) ) {
    die("Unable to select $mydb");
}

$SQLcmd = "SELECT * FROM $table_name;";    
// print "<br>The query is <i>$SQLcmd</i><br>";
        
$result = mysqli_query($connect, $SQLcmd);
if ( !$result ) {
    die("Process Failed: SQLcmd=$SQLcmd");
}

print "<form action='Insert.php' method='POST'>";
        print "<table>";
        print "<th bgcolor='#6495ED' width='150'>CatID</th>"
        . "<th bgcolor='#6495ED' width='500'>Title</th>"
                . "<th bgcolor='#6495ED' width='500'>Desciption</th>";
        
while ($row = mysqli_fetch_row($result) ) {
    print "<tr>";
    foreach ($row as $field) { print "<td>$field</td>"; }
    print "</tr>";
}

print '<tr>'
. '<td><input type="text" name="id"></id>'
. '<td><input type="text" style="width:500" name="title"></id>'
. '<td><input type="text" style="width:500" name="description"></id>';

print '</table>';

print "<input type='hidden' name='table_name' value='$table_name'>";
print '<input type="submit" value="Add Category">';
print '</form>';
        
//Close connection to database       
        mysqli_close($connect);
?>
    </body>
</html>