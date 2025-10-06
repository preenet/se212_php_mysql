<?php include 'header.php'; ?>

<h2>SE212 PHP MySQL Project - Main Menu</h2>

<div style="padding: 20px;">
    <h3>Database Connection</h3>
    <ul>
        <li><a href="connect.php">Test Database Connection</a> - Verify MySQL connection and display server information</li>
    </ul>

    <h3>CRUD Operations</h3>
    <ul>
        <li><a href="create.php">Create</a> - Insert a new customer record into the database</li>
        <li><a href="read.php">Read (Object-Oriented)</a> - Display all customers using OO style</li>
        <li><a href="read1.php">Read (Procedural)</a> - Display all customers using Procedural style</li>
        <li><a href="update.php">Update</a> - Modify an existing customer record</li>
        <li><a href="delete.php">Delete</a> - Remove a customer record from the database</li>
    </ul>

    <h3>About This Project</h3>
    <p>This project demonstrates basic database operations using PHP and MySQL. Each link above will execute a different database operation on the Order Management (OM) database.</p>
    
    <p><strong>Note:</strong> Make sure XAMPP Apache and MySQL services are running before accessing these pages.</p>
</div>

<?php include 'footer.php'; ?>
