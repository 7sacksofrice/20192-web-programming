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
                print("Your final grade is $final. ");
                print("You got an A. ");
                print("Congratulation! ");
            } elseif ($final > 79) {
                print("Your final grade is $final. ");
                print("You got an B. ");
            } elseif ($final > 69) {
                print("Your final grade is $final. ");
                print("You got an C. ");
            } elseif($final > 59) {
                print("Your final grade is $final. ");
                print("You got an D. ");
            } elseif($final >= 0) {
                print("Your final grade is $final. ");
                print("You got an F. ");
            } else {
                print("Invalid grade (less than 0).");
            }
        ?>
    </body>
</html>