<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login_form.html'); // Przekierowanie na formularz logowania, jeśli sesja jest nieaktywna
    exit();
}

// Sprawdzenie, czy użytkownik jest administratorem
if ($_SESSION['is_admin'] != 1) {
    header('Location: user_dashboard.php'); // Przekierowanie użytkownika na panel użytkownika
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Administratora</title>
</head>
<body>
    <h1>Panel administratora</h1>
    <!-- Tutaj dodaj treść dla panelu administratora -->
</body>
</html>
