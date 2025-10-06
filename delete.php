<?php

include 'connect.php';

// SQL query for insert
$sql = "DELETE FROM `customers` WHERE `customer_first_name` = 'Antony' and `customer_last_name` = 'Lee'";

// Execute the query
$conn->query($sql);
echo "<p>Successfully deleted" . mysqli_affected_rows($conn) . " record(s).</p>";



// Close the connection
$conn->close();

?>
