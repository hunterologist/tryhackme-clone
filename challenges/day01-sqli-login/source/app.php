<?php
// File: source/app.php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sqli_challenge";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>🎉 Welcome, $username!</h2>";
} else {
    echo "<h2>❌ Login failed!</h2>";
}

mysqli_close($conn);
?>
