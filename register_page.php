<?php
require_once 'header.php ';
?>
    <div class="reglogForm">
        <h2>Form Pendaftaran</h2>
        <form action="register_page.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="hidden" name="role" value="2">
            <input type="submit" value="Daftar">
        </form>

    
    </div>
</body>
</html>