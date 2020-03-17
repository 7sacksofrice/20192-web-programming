<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercise 2.3</title>
    </head>
    <body>
        <!--example 10-->
<!--        <form>
        <p><input type="text" name="username">
        <input type="submit" value="Send"></p>
        </form>-->
        
        <!--example 11-->
        <form>   
        <p>Click submit to start our initial PHP program.
        <br> 
        <input type="submit" value="Click To Submit">
        <input type="reset" value="Erase and Restart">
        </p>
        </form>
        
        <?php
//            example 1
//        $first_num = 12;
//        $second_num = 356; 
//        $temp = $first_num;
//        $first_num = $second_num;
//        $second_num = $temp;
//        print ("first_num= $first_num <br>
//                second_num=$second_num<br>");
        
//      example 2
//        $columns = 20;
//        $rows = 12;
//        $total_seats = $rows * $columns;
//
//        $ticket_cost = 3.75;
//        $total_revenue = $total_seats * $ticket_cost;
//
//        $building_cost = 300;
//        $profit = $total_revenue - $building_cost;
//
//        print ("Total Seats are $total_seats <br>");
//        print ("Total Revenue is $total_revenue <br>");
//        print ("Total Profit is $profit<br>");
        
//        example 3
//        $grade1 = 50;
//        $grade2 = 100;
//        $grade3 = 75;
//        $average = ($grade1 + $grade2 + $grade3) / 3;
//        print ("The average is $average<br>");
        
//        example 4
//          $firstname = "John";
//          $lastname = "Smith";
//          $fullname = $firstname . $lastname;
//          print ("Fullname=$fullname");
          
//          example 5
//        $comments = "Good Job";
//        $len = strlen($comments);
//        print ("Length=$len");
        
//        example 6
//        $in_name = " Joe Jackson ";
//        $name = trim($in_name);
//        print ("name=$name$name");
        
//        example 7
//        $inquote = "Now Is The Time";
//        $lower = strtolower($inquote);
//        $upper = strtoupper($inquote);
//        print ("upper=$upper lower=$lower");
        
//        example 8
//        $date = "12/25/2002";
//        $month = substr($date, 0, 2);
//        $day = substr($date, 3, 2);
//        print ("Month=$month Day=$day");
        
//        example 9
//        $date = "12/25/2002";
//        $year = substr($date, 6);
//        print ("Year=$year");
        ?>
    </body>
</html>

<!--example 12
<html>
 <head><title> Receiving Input </title> </head>
 <body>
 <font size=5>Thank You: Got Your Input.</font>
 <?php
 print ("<br>Your email address is $email");

 print ("<br> Contact preference is $contact");
 ?>
</html>

example 13
<html>
 <head><title> Receiving Input </title> </head>
 <body>
 <font size=5>Thank You: Got Your Input.</font>
 <?php
 $email = $_POST["email"];
 $contact = $_POST["contact"];
 print ("<br>Your email address is $email");
 print ("<br> Contact preference is $contact");
 ?>
</html>-->