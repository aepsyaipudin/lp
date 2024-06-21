<?php
require_once 'header.php ';
?>
    <div class="reglogForm">
 
        <h2>Form Login</h2>
        <form action="login.php" method="POST">
            <label for="login_username">Username:</label><br>
            <input class="inputSec" type="text" id="login_username" name="login_username" required><br><br>

            <label for="login_password">Password:</label><br>
            <input class="inputSec" type="password" id="login_password" name="login_password" required><br><br>

            <input class="inputSec" type="submit" value="Login"><br>
            
        </form>
        <a href="register_page.php" ><button class="regBtn" >Daftar</button></a>
    </div>
</body>
</html>