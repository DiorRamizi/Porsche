<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "porsche";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$description = $_POST['description'];

$sql = "INSERT INTO users (first_name, last_name, description) VALUES ('$fname', '$lname', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>