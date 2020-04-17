<html><head><meta charset="UTF-8">
<title>Insert Results</title></head>
<body>
<?php
function insertCategories() {
    $ID =filter_input(INPUT_POST, 'id');
    $title =filter_input(INPUT_POST, 'title');
    $description =filter_input(INPUT_POST, 'description');
    return "INSERT INTO categories VALUES"
        . "( '$ID', '$title', '$description' );";
}

function insertBusinesses() {
    $ID = uniqid();
    $name =filter_input(INPUT_POST, 'name');
    $address =filter_input(INPUT_POST, 'address');
    $city =filter_input(INPUT_POST, 'city');
    $telephone =filter_input(INPUT_POST, 'telephone');
    $url =filter_input(INPUT_POST, 'url');

    $insert_into_biz_cat = '';
    foreach ($_POST['category'] as $selectedOption)
        $insert_into_biz_cat .= "INSERT INTO Biz_Categories VALUES"
            . "( '$ID', '$selectedOption');";

    return "INSERT INTO businesses VALUES"
        . "( '$ID', '$name', '$address', '$city', '$telephone' , '$url' ); $insert_into_biz_cat";
}

$server = 'localhost';
session_start();

$user = $_SESSION['username'];
$pass = $_SESSION['password'];
$mydb = 'business_service';

// Print POST data received
print_r($_POST);

// Print categories selected
// foreach ($_POST['category'] as $selectedOption)
//     echo $selectedOption."\n";

$table_name = filter_input(INPUT_POST, 'table_name');

$connect = mysqli_connect($server, $user, $pass);
if( !$connect ) {    die("Cannot connect to $server using $user" ); }

// Insert into table
if($table_name === 'categories') {
    $previous_page = 'admin.php';
    $SQLcmd = insertCategories(); 
}
if($table_name === 'businesses') {
    $previous_page = 'add_biz.php';
    $SQLcmd = insertBusinesses(); 
}
    
print "The query is $SQLcmd<br>";    
   
if ( !mysqli_select_db($connect, $mydb) ) {
    exit("Unable to select $mydb");
}
    
if ( mysqli_multi_query($connect, $SQLcmd) ) {
    print "Insert into $mydb was successful!";
} else {
    die("Table Inserting Process Failed: SQLcmd=$SQLcmd");
}
    
mysqli_close($connect);

header("refresh:5; url=http://localhost/Lab6/BusinessDb/$previous_page", true, 301);

?>
</body></html>