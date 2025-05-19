<?php
$conn = new mysqli('localhost', 'root', '', 'connet');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO npi_clg (fullName, email, phone, address) VALUES ('$fullName', '$email', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    }
}
?>
