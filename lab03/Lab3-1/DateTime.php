<html>
    <head><title>Date Time Validation</title></head>
    <body>
        <p>Enter your name and select date and time for appointment <br></p>
        <br>
        <form action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF') ?>" method="GET">
            
            <table>
                <tr>
                    <td>Your name: </td>
                    <td><input type="text" id="name" name="name"></td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td>
                        <select name="day">
                            <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    printf("<option>%'02d</option>", $i);
                                }
                            ?>
                        </select>
                        <select name="month">
                            <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    printf("<option>%'02d</option>", $i);
                                }
                            ?>
                        </select>
                        <select name="year">
                            <?php
                                for ($i = 2020; $i <= 2030; $i++) {
                                    print("<option>$i</option>");        
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Time: </td>
                    <td>
                        <select name="hour">
                            <?php
                                for ($i = 0; $i <= 23; $i++) {
                                    printf("<option>%'02d</option>", $i);        
                                }
                            ?>
                        </select>
                        <select name="minute">
                            <?php
                                for ($i = 0; $i <= 59; $i++) {
                                    printf("<option>%'02d</option>", $i);
                                }
                            ?>
                        </select>
                        <select name="second">
                            <?php
                                for ($i = 0; $i <= 59; $i++) {
                                    printf("<option>%'02d</option>", $i);
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="SUBMIT" value="Submit"></td>
                    <td align="left"><input type="RESET" value="Reset"></td>
                </tr>
            </table>
            <?php 
                $name = filter_input(INPUT_GET, "name");
                $day = filter_input(INPUT_GET, "day");
                $month = filter_input(INPUT_GET, "month");
                $year = filter_input(INPUT_GET, "year");
                $hour = filter_input(INPUT_GET, "hour");
                $minute = filter_input(INPUT_GET, "minute");
                $second = filter_input(INPUT_GET, "second");
                $day_in_month = 31;
                
                if($day != NULL) {
                    print("Hi $name!<br>");
                }
                
                if($month == 4 or $month == 6 or $month == 9 or $month == 11) {
                    $day_in_month = 30;
                    if($day > $day_in_month) {
                        exit("Invalid date. There are only 30 days in this month.");
                    }
                }
                
                if($month == 2) {
                    $day_in_month = 28;
                    
                    if( ($year % 100 != 0 and $year % 4 == 0) or ($year % 100 == 0 and $year % 400 == 0)) {
                        $day_in_month = 29;
                    }
                    
                    if($day > $day_in_month) {
                        exit("Invalid date. There are only $day_in_month days in this month.");
                    }
                }
                
                print("You have chosen to have an appointment on $hour:$minute:$second, $day/$month/$year<br><br>");
                print("More Information<br><br>");
                print("In 12 hours, the time and date is ");
                
                if($hour < 12) {
                    print("$hour:$minute:$second AM, $day/$month/$year<br><br>");
                } else {
                    print($hour - 12 . ":$minute:$second PM, $day/$month/$year<br><br>");
                }
                
                print("This month has $day_in_month days!");
                
            ?>
           
        </form>
    </body>
</html>