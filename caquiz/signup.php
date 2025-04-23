<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "caquiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $matrix_number = $_POST['matrix_number'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    $sql = "INSERT INTO users (full_name, matrix_number, username, password) 
            VALUES ('$full_name', '$matrix_number', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
