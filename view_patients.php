<?php
$conn = new mysqli("localhost", "root", "", "hospital_management");

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

echo '<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Email</th><th>Phone</th></tr>';
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td></tr>";
	}
} else {
	echo "<tr><td colspan='6'>No records found</td></tr>";
}
echo '</table>';

$conn->close();
