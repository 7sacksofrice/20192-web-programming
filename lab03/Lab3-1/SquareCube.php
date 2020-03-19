<html>
    <head><title>Square and Cube</title></head>
    <body>
        <font size="5" color="blue">Generate Square and Cube Value<br> </font>
        <br>
        <form action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF') ?>" method="GET">
            <?php
                $start = filter_input(INPUT_GET, "start");
                $end = filter_input(INPUT_GET, "end");
            ?>
            <table>
                <tr>
                    <td>Select Start Number: </td>
                    <td>
                        <select name="start">
                            <?php
                                for ($i = 0; $i <= 10; $i++) {
                                    if($start == $i) {
                                        print("<option selected>$i</option>");
                                    } else {
                                        print("<option>$i</option>");    
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select End Number: </td>
                    <td>
                        <select name="end">
                            <?php
                                for ($i = 10; $i <= 20; $i++) {
                                    if($end == $i) {
                                        print("<option selected>$i</option>");
                                    } else {
                                        print("<option>$i</option>");    
                                    }
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
            
            <table>
                <tr>
                    <th>Number</th><th>Square</th><th>Cube</th>
                </tr>
                <?php 
                    if($start != NULL and $end != NULL) {
                        while($start <= $end) {
                            $sqr = $start * $start;
                            $cube = $sqr * $start;
                            print("<tr>"
                                ."<td> $start </td><td> $sqr </td><td> $cube </td>"
                                . "</tr>");
                        
                            $start++;
                        }
                    }
                ?>
            </table>
        </form>
    </body>
</html>