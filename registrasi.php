<?php 
require 'function.php';

if( isset( $_POST["register"] ) ) {
    if( register($_POST) > 0 ) {
        echo"<script>
            alert('user baru telah ditambahkan!');
        </script>";
    } else {
        echo mysqli_error($link);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman registrasi</title>
        <style>
            label {
            display: block;
            }
        </style>
    </head>
    <body>
        <h1>Halaman registrasi</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label form="username">Username : </label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label form="password">Password : </label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label form="password2">Konformasi Password : </label>
                    <input type="password" name="password2" id="password2">
                </li>
                <li>
                    <button type="submit" name="register">Register!</button>
                </li>
            </ul>
        </form>
        <a href="login.php">login</a>
    </body>
</html>