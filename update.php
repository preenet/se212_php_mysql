<?php

include 'connect.php';

// SQL query for insert
$sql = "UPDATE `customers` SET `customer_fax`='12345678' WHERE `customer_first_name` = 'Johnathon'";

// Execute the query
$conn->query($sql);
echo "<p>Successfully updated " . mysqli_affected_rows($conn) . " record(s).</p>";



// Close the connection
$conn->close();

?>
