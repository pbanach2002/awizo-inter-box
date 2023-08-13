<?php
session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'calendar';

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if ($password === $user['password']) { // Porównanie haseł jako tekstu
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['is_admin'] = $user['is_admin'];

            if ($user['is_admin'] == 1) {
                header('Location: admin_dashboard.php');
            } else {
                header('Location: user_dashboard.php');
            }
            exit();
        } else {
            echo "Błędne hasło.";
        }
    } else {
        echo "Użytkownik nie istnieje.";
    }
}

mysqli_close($connection);
?>
