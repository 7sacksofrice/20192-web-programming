<html>
    <head><title>Date Time Validation</title></head>
    <body>
        <font size="6" color="red">Enter name and birthday of you and your friend<br> </font>
        <br>
        <form action="" method="GET">
            <table>
                <tr>
                    <td colspan="2"><font size="3" color="blue"> User 1 </font></td>
                </tr>
                <tr>
                    <td>Your name: </td>
                    <td><input type="text" id="name1" name="name1"></td>
                </tr>
                
                <tr>
                    <td>Your birthday: </td>
                    <td><input type="text" id="birthday1" name="birthday1"></td>
                </tr>
                
                <tr>
                    <td colspan="2"> <font size="3" color="blue">User 2</font></td>
                </tr>
                <tr>
                    <td>Your name: </td>
                    <td><input type="text" id="name2" name="name2"></td>
                </tr>
                
                <tr>
                    <td>Your birthday: </td>
                    <td><input type="text" id="birthday2" name="birthday2"></td>
                </tr>
                <tr>
                    <td align="right"><input type="SUBMIT" value="Submit"></td>
                    <td align="left"><input type="RESET" value="Reset"></td>
                </tr>
            </table>
            <?php 
            function newline() {
                print("<br>");
            }
            
            function linebreak() {
                print '<hr />';
            }
            
            function validatesAsInt($number)
            {
                $number = filter_var($number, FILTER_VALIDATE_INT);
                return ($number !== FALSE);
            }
            
            function validateDate($day, $month, $year) {
                if( !validatesAsInt( ltrim($day , '0') ) or $day < 1 or $day > 31) {
                   print("Invalid day input...<br>");
                   return 0;
               }if( !validatesAsInt( ltrim($month, '0') ) or $month < 1 or $month > 12 ) {
                   print("Invalid month input...<br>");
                   return 0;
               }if( !validatesAsInt( ltrim($year, '0') ) or $year < 0 ) {
                   print("Invalid year input...<br>");
                   return 0;
               }
              
               $day_in_month = 31;
                
                if($month == 4 or $month == 6 or $month == 9 or $month == 11) {
                    $day_in_month = 30;
                    if($day > $day_in_month) {
                        print("Invalid date. There are only 30 days in this month.");
                        return 0;
                    }
                }
                
                if($month == 2) {
                    $day_in_month = 28;
                    
                    if( ($year % 100 != 0 and $year % 4 == 0) or ($year % 100 == 0 and $year % 400 == 0)) {
                        $day_in_month = 29;
                    }
                    
                    if($day > $day_in_month) {
                        print("Invalid date. There are only $day_in_month days in this month.");
                        return 0;
                    }
                }
                
                return 1;
            }
            ?>
            
            <?php 
                $name1 = filter_input(INPUT_GET, "name1");
                $bday1 = filter_input(INPUT_GET, "birthday1");
                $name2 = filter_input(INPUT_GET, "name2");
                $bday2 = filter_input(INPUT_GET, "birthday2");
                
                newline();
                linebreak();
                $array_date1 = explode('/', $bday1);
                $array_date2 = explode('/', $bday2);
                if( sizeof($array_date1) !== 3 or sizeof($array_date2) !== 3) {
                    exit("Please Enter a Valid Birthday Input(dd/mm/yyyy)...<br>");
                }
                
                if( validateDate($array_date1[0], $array_date1[1], $array_date1[2]) === 0
                        or
                    validateDate($array_date2[0], $array_date2[1], $array_date2[2]) === 0
                    ) {
                    exit();
                }
                
                $date1 =  $array_date1[1] . '/' . $array_date1[0] . '/' . $array_date1[2];
                print("Birthday of $name1: ");
                echo date("l, F d, Y", strtotime($date1));
                newline();
                
                $date2 = $array_date2[1] . '/' . $array_date2[0] .  '/' . $array_date2[2];
                print("Birthday of $name2: ");
                echo date("l, F d, Y", strtotime($date2));
                newline();
                
                linebreak();
                
                $now = new DateTime();
                $datetime1 = date_create($date1); 
                $datetime2 = date_create($date2);
                $interval = date_diff( $datetime1, $datetime2 );
                $age1 = date_diff( $datetime1, $now );
                $age2 = date_diff( $datetime2, $now );
                newline();
                print("The difference in days between two dates is ");
                echo $interval->format('%a days');
                newline();
                linebreak();
                newline(); 
                print("Age of $name1 is ");
                echo $age1->format('%y.');
                newline(); 
                print("Age of $name2 is ");
                echo $age2->format('%y.');
                newline();
                linebreak();
                newline(); 
                print("$name1 and $name2 is ");
                echo $interval->format('%y year(s) apart.');
                newline(); 
           ?>
           
        </form>
    </body>
</html>