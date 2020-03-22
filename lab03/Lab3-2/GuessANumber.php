<html>
    <head>
        <meta charset="UTF-8">
        <title>Guess A Number</title>
    </head>
    <body>
        <font size=4 color="BLUE">Please Pick A Number </font>
        
        <form action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF'); ?>" method="POST" >
            <label for="pick">Your pick: </label>
            <input type="text" name="pick" id="pick">
            <br>
            <input type="SUBMIT" value="Submit">
            <input type="RESET" value="Reset">
        </form>
        
        <?php
        function compare_two_numbers($n1, $n2) {
            $counter = filter_input(INPUT_COOKIE, 'counter');
            setcookie('counter', $counter + 1 );
            $counter++;
            
            if( $n1 < $n2) {
                print("Wrong. Please try a higher number. You have guess $counter time(s)!");
            } elseif ( $n1 > $n2) {
                print("Wrong. Please try a lower number. You have guess $counter time(s)!");
            } else {
                print("That's right! The number is $n1");
                setcookie('counter', 0 );
                setcookie('rand', rand(0, 100) );
            }
        }
        ?>
        
        <?php 
        if( !isset($_COOKIE['rand']) ) { setcookie('rand', rand(0, 100) ); }
        if( !isset($_COOKIE['counter'])  ) { setcookie('counter', 0 ); }
        
        $the_number = filter_input(INPUT_COOKIE, "rand");
        $pick = filter_input(INPUT_POST, "pick");
        
        if(empty($pick)) { exit();}
        if (!is_numeric($pick)) { exit("Invalid input. You must enter a number!"); }
        
        compare_two_numbers($pick, $the_number);
        ?>
    </body>
</html>