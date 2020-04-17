<html>
    <head><title>Business Listings</title></head>
    <body>
        <font size="8"><b>Business Listings</b></font>
        <br>
<?php

function connectDatabase() {
    // database info.
    $server = 'localhost';
    $mydb = 'business_service';

    // get username and password to start connection
    session_start();
    $user = $_SESSION['username'];
    $pass = $_SESSION['password'];

    // print data in SESSION
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";

    // Connect to the database and Exit if unable to connect
    $connect = mysqli_connect($server, $user, $pass);
    if( !$connect ) {    die("Cannot connect to $server using $user" ); }

    // Select database
    if ( !mysqli_select_db($connect, $mydb) ) {die("Unable to select $mydb");}

    return $connect;
}

function printTable1($result) {
    print '<table border=1>
    <tr>
    <td><b>Click on category<br>to find business listings: </td>   
    </tr>';
    
    // Print values we queried to Table 1
    while ($row = mysqli_fetch_row($result) ) {
        print '<tr><td>';
        $id = $row[0];
        $title = $row[1];
        print "<button name='id' value='$id' type='submit' 
        style='background:none; border-width:0px; color:blue; text-decoration:underline;'>$title</button>";
        print '</td></tr>';
    }

    print '</table>';
}

function printTable2($catid, $connect) {
    // get Business ID
    $SQLcmd_getBusinessID = "SELECT BusinessID FROM Biz_Categories where CategoryID = '$catid';";    
    // print "<br>The query is <i>$SQLcmd_getBusinessID</i><br>";
    $businessIDs = mysqli_query($connect, $SQLcmd_getBusinessID);
    
    print '<table border=1>';
    while ($businessID = mysqli_fetch_row($businessIDs) ) {
        print "<tr>";
        // get each business form $businessIDs
        $id = $businessID[0];
        $SQLcmd_getBusiness = "SELECT * FROM businesses where BusinessID = '$id';";    
        // print "<br>The query is <i>$SQLcmd_getBusiness</i><br>";
        $business = mysqli_query($connect, $SQLcmd_getBusiness);
                
        // for each business, print values
        while ($row = mysqli_fetch_row($business) ) {
            foreach ($row as $value) {
                print '<td>';
                print "$value";
                print '</td>';
            }
        }

        print "<td>$catid</td>";
        print "</tr>";
    }
    

    print '</table>';
}

$connect = connectDatabase();

// Query command to get ID and title from table 'categories'
$SQLcmd = "SELECT CategoryID,title FROM categories;";    
// print "<br>The query is <i>$SQLcmd</i><br>";
        
$result = mysqli_query($connect, $SQLcmd);
if ( !$result ) {
    die("Process Failed: SQLcmd=$SQLcmd");
}

print "<form action='' method='GET'>";
// Open Big Table
print '<table> <tr>';

// Print Table 1
print '<td>';
printTable1($result);
print '</td>';

// Print Table 2
print '<td>';

$ret2 = filter_input(INPUT_GET, 'id');
if ( $ret2 ) {
    // echo $ret2;
    printTable2($ret2, $connect);
}
print '</td>';

//Close Big Table        
print '</tr></table>';

// print "<input type='hidden' name='table_name' value='$table_name'>";
print '</form>';
//Close connection to database       
mysqli_close($connect);
?>
    </body>
</html>