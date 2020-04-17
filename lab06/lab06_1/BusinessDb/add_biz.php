<html>
    <head><title>Business Administration</title></head>
    <body>
        <font size="8"><b>Business Administration</b></font>
        <br>
<?php

function printOpenTable1() {
    print '<table>
    <tr>
    <td>Click on one, or control-click on<br>multiple categories</td>   
    </tr>
    <tr>   <td><select name="category[]" size="4" multiple>';
}
function printCloseTable1() {
    print '</select></td>   </tr>';
    print '</table>';
}

function printTable2() {
    print '<table>';

    print '<tr> <td>Business Name: </td> <td><input type="text" name="name"></td> </tr>';
    print '<tr> <td>Address: </td> <td><input type="text" name="address"></td> </tr>';
    print '<tr> <td>City: </td> <td><input type="text" name="city"></td> </tr>';
    print '<tr> <td>Telephone: </td> <td><input type="text" name="telephone"></td> </tr>';
    print '<tr> <td>URL: </td> <td><input type="text" name="url"></td> </tr>';
    
    print '</table>';
}

$server = 'localhost';
session_start();

$user = $_SESSION['username'];
$pass = $_SESSION['password'];
$mydb = 'business_service';
$table_name = 'businesses';

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// Connect to the database
$connect = mysqli_connect($server, $user, $pass);
// Exit if unable to connect
if( !$connect ) {    die("Cannot connect to $server using $user" ); }

// Select database
if ( !mysqli_select_db($connect, $mydb) ) {
    die("Unable to select $mydb");
}

// Query command to get ID and title from table 'categories'
$SQLcmd = "SELECT CategoryID,title FROM categories;";    
// print "<br>The query is <i>$SQLcmd</i><br>";
        
$result = mysqli_query($connect, $SQLcmd);
if ( !$result ) {
    die("Process Failed: SQLcmd=$SQLcmd");
}

print "<form action='Insert.php' method='POST'>";
// Open Big Table
print '<table> <tr>';

// Print Table 1
print '<td>';
printOpenTable1();
// Print values we queried to Table 1
while ($row = mysqli_fetch_row($result) ) {
    $value = $row[0]; $title = $row[1];
    print "<option value='$value'>$title</option>";
}
printCloseTable1();
print '</td>';

// Print Table 2
print '<td>';
printTable2();
print '</td>';

//Close Big Table        
print '</tr></table>';

print "<input type='hidden' name='table_name' value='$table_name'>";
print '<input type="submit" value="Add Category">';
print '</form>';
//Close connection to database       
mysqli_close($connect);
?>
    </body>
</html>