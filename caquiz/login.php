<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caquiz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            echo "Login successful!";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>
