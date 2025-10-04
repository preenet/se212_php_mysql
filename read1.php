<?php

include 'connect.php';
// SQL query
$sql = "SELECT * FROM customers";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check for and retrieve results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["customer_id"] . ", Name: " . $row["customer_first_name"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close the connectionw
mysqli_close($conn);
?>
