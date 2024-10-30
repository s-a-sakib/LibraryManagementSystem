<?php
$user = 'army';
$pass = '123456';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] == $user && $_POST['password'] == $pass) {
        header('Location: ../View/table.php');
        exit();
    }else {
        // Redirect back to the login page with an error message (use query string)
        header('Location: ../index.php');
        exit();
    }
}
?>
