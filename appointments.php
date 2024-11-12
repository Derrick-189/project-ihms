<?php
$conn = new mysqli("localhost", "root", "", "hospital_management");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$patient_name = $_POST["patient_name"];
	$doctor = $_POST["doctor"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$phone = $_POST["phone"];
	$comments = $_POST["comments"];

	$patient_query = "SELECT id FROM patients WHERE name='$patient_name' AND phone='$phone'";
	$result = $conn->query($patient_query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$patient_id = $row['id'];

		$sql = "INSERT INTO appointments (patient_id, doctor, date, time, phone, comments)
                VALUES ('$patient_id', '$doctor', '$date', '$time', '$phone', '$comments')";

		if ($conn->query($sql) === TRUE) {
			echo "Appointment booked successfully";
		} else {
			echo "Error: " . $conn->error;
		}
	} else {
		echo "Patient not found.";
	}
}
$conn->close();
