<?php
require_once 'header.php ';
?>
    <div class="container">
        <h2>Form Pendaftaran</h2>
        <form action="register.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="hidden" name="role" value="2">
            <input type="submit" value="Daftar">
        </form>

        <h2>Form Login</h2>
        <form action="login.php" method="POST">
            <label for="login_username">Username:</label><br>
            <input type="text" id="login_username" name="login_username" required><br><br>

            <label for="login_password">Password:</label><br>
            <input type="password" id="login_password" name="login_password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>