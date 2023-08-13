<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login_form.html'); // Przekierowanie na formularz logowania, jeśli sesja jest nieaktywna
    exit();
}

// Sprawdzenie, czy użytkownik jest administratorem
if ($_SESSION['is_admin'] == 1) {
    header('Location: admin_dashboard.php'); // Przekierowanie administratora na panel administratora
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Użytkownika</title>
</head>
<body>
    <h1>Panel użytkownika</h1>
    <!-- Tutaj dodaj treść dla panelu użytkownika -->
</body>
</html>
