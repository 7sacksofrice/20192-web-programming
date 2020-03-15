<html>
 <head> <title>Variable Example </title> </head>
 <body>
 <?php
 $columns = 20;
 $rows = 12;
 $total_seats = $rows * $columns;

 $ticket_cost = 3.75;
 $total_revenue = $total_seats * $ticket_cost;

 $building_cost = 300;
 $profit = $total_revenue - $building_cost;

print ("Total Seats are $total_seats <br>");
print ("Total Revenue is $total_revenue <br>");
print ("Total Profit is $profit");
?> </body> </html>