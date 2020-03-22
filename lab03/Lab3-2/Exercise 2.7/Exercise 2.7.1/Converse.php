<html>
    <body>        
        <form action="" method="POST"><br>
            Enter a Value: <input type="text" name="value"><br><hr />
        <input type="submit" value="To Radian" name="submit">
        <input type="submit" value="To Degree" name="submit">
        </form>
        
        <?php 
        function toRadian($val) {
            return 0.0174533 * $val;
        }
        
        function toDegree($val) {
            return 57.2958 * $val;
        }
        ?>
        
        <?php
        $choice = filter_input(INPUT_POST, 'submit');
        $val = filter_input(INPUT_POST, 'value');
        
        if ( !is_numeric($val) ) {
            exit("Please enter a number");    
        }
        
        if ( strcmp($choice, "To Radian") === 0) {
            printf("Radian value is: %.2f", toRadian($val));
        }
        if ( strcmp($choice, "To Degree") === 0) {
            printf("Degree value is: %.2f", toDegree($val));
        }
        ?>
        
    </body>
</html>