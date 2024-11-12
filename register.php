<?php
$conn = new mysqli("localhost", "root", "", "hospital_management");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$medical_history = $_POST["medical_history"];

	$sql = "INSERT INTO patients (name, age, gender, phone, email, address, medical_history)
            VALUES ('$name', '$age', '$gender', '$phone', '$email', '$address', '$medical_history')";

	if ($conn->query($sql) === TRUE) {
		echo "Patient registered successfully";
	} else {
		echo "Error: " . $conn->error;
	}
}
$conn->close();
