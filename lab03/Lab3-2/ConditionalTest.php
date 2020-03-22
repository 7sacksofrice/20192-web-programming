<html>
    <head><title>Conditional Test</title></head>
    <body>
        <?php
            $first = $_GET["firstName"];
            $middle = $_GET["middleName"];
            $last = $_GET["lastName"];
            $grade1 = $_GET["grade1"];
            $grade2 = $_GET["grade2"];
            $final = (2 * $grade1 + 3 * $grade2) / 5;
            
            print("Hi $first! Your full name is $last $middle $first.<br>");
            
            print('<br>');
            
            if($first == $last) {
                print("$first and $last are equal.<br>");
            }
            if($first > $last) {
                print("$first is greater than $last.<br>");
            }
            if($first < $last) {
                print("$first is less than $last.<br>");
            }
            
            print('<br>');
            
            if($final > 89) {
                printf("Your final grade is %.1f. You got an A. Congratulation! ", $final);
            } elseif ($final > 79) {
                printf("Your final grade is %.1f. You got an B.", $final);
            } elseif ($final > 69) {
                printf("Your final grade is %.1f. You got an C.", $final);
            } elseif($final > 59) {
                printf("Your final grade is %.1f. You got an D.", $final);
            } elseif($final >= 0) {
                printf("Your final grade is %.1f. You got an F.", $final);
            } else {
                print("Invalid grade (less than 0).");
            }
        ?>
    </body>
</html>