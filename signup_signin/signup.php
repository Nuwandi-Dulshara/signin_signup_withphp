<?php
include 'connection.php';

$response = array();

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
} else {
    $response['status'] = 'error';
    $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo json_encode($response);
?>
