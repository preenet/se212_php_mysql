<?php include 'header.php'; ?>

<?php

include 'connect.php';

// SQL query
$sql = "SELECT * FROM customers";

// Execute the query
$result = $conn->query($sql);

// Check for and retrieve results
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "ID: " . $row["customer_id"] . ", Name: " . $row["customer_first_name"] . "<br>";
}
} else {
echo "0 results";
}

// Close the connection
$conn->close();

?>

<?php include 'footer.php'; ?>
