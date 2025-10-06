<?php

include 'connect.php';

// SQL query for insert
$sql1 = "INSERT INTO customers (customer_id, customer_first_name, customer_last_name,customer_address, customer_city,customer_state,customer_zip,customer_phone) VALUES (26,'Antony','Lee','123 Tally','Texas','US','14725','025723458')";

// Execute the query
$conn->query($sql1);
echo "<p>Successfully created" . mysqli_affected_rows($conn) . " record(s).</p>";

// SQL query for select
$sql2 = "SELECT * FROM customers";

// Execute the query
$result = $conn->query($sql2);

// Check for and retrieve results
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "ID: " . $row["customer_id"] . ", Name: " . $row["customer_first_name"] . " ".$row["customer_last_name"] ."<br>";
}
} else {
echo "0 results";
}
// Close the connection
$conn->close();
?>
