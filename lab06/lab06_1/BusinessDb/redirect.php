<html>
    <head><title>Redirecting...</title>
    <?php
$page = filter_input(INPUT_POST, 'page');

$redirecting_page;

switch ($page) {
    case 'category':
        $redirecting_page = 'admin.php';
        break;
    case 'business':
        $redirecting_page = 'add_biz.php';
        break;
    case 'buscat':
        $redirecting_page = 'biz_listing.php';
        break;
}

session_start();
$_SESSION['username'] = filter_input(INPUT_POST, 'username') ;
$_SESSION['password'] = filter_input(INPUT_POST, 'password');
        

header("Location: http://localhost/Lab6/BusinessDb/$redirecting_page", true, 301);
exit();
?>
    </head>
    <body>
        <font size="10" color="blue">Redirecting...</font>
        </body>
</html>