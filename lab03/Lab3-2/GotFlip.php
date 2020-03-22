<html>
    <head>
        <meta charset="UTF-8">
        <title>Coin Flip Results</title>
    </head>
    <body>
        <?php 
        srand ( (double) microtime() * 10000000 );
        $flip = rand(0, 1);
        $pick = filter_input(INPUT_POST, "pick");
    
        print("The flip=$flip, which is ");
        $flip == 0 ? print("heads!<br>") : print("tails!<br>");
        if ( $flip == $pick ) {
            print('<font color="blue">You got it right!</font>');
        } else {
            print('<font color="red">You got it wrong!</font>');
        }

        ?>
    </body>
</html>
