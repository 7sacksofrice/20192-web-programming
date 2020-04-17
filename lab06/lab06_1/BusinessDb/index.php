<html>
    <head><title>Login Page</title></head>
    <body>
        <font size="10" color="blue">Login</font>
        <form action="redirect.php" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input name="username" type="text"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input name="password" type="password"></td>
                </tr>
            </table>
                <input type="radio" name="page" value="category"> Category Page
                <input type="radio" name="page" value="business"> Business Page
                <input type="radio" name="page" value="buscat"> Business-Category Page
         
                <br>
                <input name="Login" type="submit">
        </form>

        </body>
</html>