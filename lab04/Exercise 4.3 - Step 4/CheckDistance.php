 <html>
<head><title> Distance and Time Calculations </title></head>
 <body>
 <?php
 $destination = $_POST["destination"];
 
 $cities = array ('Dallas' => 803, 'Toronto' => 435, 'Boston' => 848, 'Nashville' => 406,
     'Las Vegas' => 1526, 'San Francisco' => 1835, 'Washington, DC'=> 595,
     'Miami'=> 1189, 'Pittsburgh' => 409);

 if( count($destination) !== 1) {
    $number_of_city = count($destination);
    print('<table border="1">');
    print('<tr><th>No.</th><th>Destination</th><th>Distance</th><th>Driving Time</th><th>Walking Time</th></tr>');
    
    foreach ($destination as $i => $value) {
        $no = $i + 1;
        $distance = $cities[$value];
        $time = round( ($distance / 60), 2);
        $walktime = round( ($distance / 5), 2);
        
        print('<tr>');
        
        print("<td>$i</td>");
        print("<td>$value</td>");
        print("<td>$distance</td>");
        print("<td>$time</td>");
        print("<td>$walktime</td>");
        print('</tr>');
    }
 } else {
     $destination2 = $destination[0];
    if (isset($cities[$destination2])) {
        $distance = $cities[$destination2];
        $time = round( ($distance / 60), 2);
        $walktime = round( ($distance / 5), 2);
        print "The distance between Chicago and <i>$destination2</i> is $distance miles.";
        print "<br>Driving at 60 miles per hour it would take $time hours.";
        print "<br>Walking at 5 miles per hour it would take $walktime hours.";
        } else {
        print "Sorry, do not have destination information for $destination2.";
        }
 }
  ?>
</body>
 </html>