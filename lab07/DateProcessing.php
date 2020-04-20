<html>
    <head><title>Date Check</title></head>
    <body>
        <?php 
        $date = filter_input(INPUT_POST, 'date');
        $two = '[[:digit:]]{2}';
        $month = '[0-1][[:digit:]]';
        $day = '[0-3][[:digit:]]';
        $year = "2[[:digit:]]$two";

        $keywords = "^($month)\/($day)\/($year)$";
        if( preg_match("/$keywords/", $date ) ) {
            print "Valid date = $date <br>";
        } else {
            print "Invalid date = $date";
        }
        ?>
    </body>
</html>