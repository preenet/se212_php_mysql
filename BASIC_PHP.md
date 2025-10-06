# PHP and MySQL Basic Concepts

## 📚 Table of Contents
1. [What is PHP?](#what-is-php)
2. [What is MySQL?](#what-is-mysql)
3. [PHP Basic Syntax](#php-basic-syntax)
4. [PHP and MySQL Connection](#php-and-mysql-connection)
5. [CRUD Operations](#crud-operations)
6. [Object-Oriented vs Procedural Style](#object-oriented-vs-procedural-style)

---

## 🌐 What is PHP?

**PHP** (Hypertext Preprocessor) is a server-side scripting language designed for web development.

### Key Features:
- **Server-side**: Code runs on the web server, not in the browser
- **Dynamic content**: Generates HTML dynamically based on data
- **Database integration**: Easily connects to databases like MySQL
- **Open source**: Free to use and widely supported

### How PHP Works:
```
1. User requests a PHP page (e.g., read.php)
2. Web server (Apache) processes the PHP code
3. PHP connects to database if needed
4. PHP generates HTML output
5. Server sends HTML to user's browser
6. Browser displays the page
```

---

## 🗄️ What is MySQL?

**MySQL** is a relational database management system (RDBMS) that stores data in tables.

### Key Concepts:
- **Database**: Collection of related tables (e.g., `om` database)
- **Table**: Organized data in rows and columns (e.g., `customers`, `items`)
- **Row**: Single record in a table (e.g., one customer)
- **Column**: Single field/attribute (e.g., `customer_name`, `price`)
- **Primary Key**: Unique identifier for each row (e.g., `customer_id`)
- **Foreign Key**: Links to another table's primary key

### Example Database Structure:
```
Database: om
├── Table: customers
│   ├── customer_id (Primary Key)
│   ├── customer_first_name
│   ├── customer_last_name
│   └── customer_city
└── Table: items
    ├── item_id (Primary Key)
    ├── title
    ├── artist
    └── unit_price
```

---

## 📝 PHP Basic Syntax

### 1. PHP Tags
PHP code is enclosed in `<?php ... ?>` tags:

```php
<?php
    // PHP code goes here
    echo "Hello, World!";
?>
```

### 2. Variables
Variables start with `$` symbol:

```php
<?php
$name = "John";           // String
$age = 25;                // Integer
$price = 19.99;           // Float/Decimal
$isStudent = true;        // Boolean

echo $name;               // Outputs: John
echo "Age: " . $age;      // Outputs: Age: 25
?>
```

### 3. Comments
```php
<?php
// This is a single-line comment

# This is also a single-line comment

/* This is a
   multi-line
   comment */
?>
```

### 4. Echo Statement
Used to output text or variables:

```php
<?php
echo "Hello";
echo "Hello" . " " . "World";  // Concatenation with .
echo "Price: $" . $price;
?>
```

### 5. Strings
Strings can use single or double quotes:

```php
<?php
$name = 'Alice';          // Single quotes
$greeting = "Hello";      // Double quotes

// Concatenation
$message = $greeting . " " . $name;  // "Hello Alice"

// Double quotes allow variable interpolation
echo "Welcome, $name!";   // "Welcome, Alice!"
?>
```

### 6. Include Files
Include external PHP files:

```php
<?php
include 'header.php';     // Include file (warns if not found)
require 'config.php';     // Require file (fatal error if not found)
?>
```

### 7. Conditional Statements
```php
<?php
if ($age >= 18) {
    echo "Adult";
} else {
    echo "Minor";
}
?>
```

### 8. Loops
```php
<?php
// While loop
while ($row = $result->fetch_assoc()) {
    echo $row["name"];
}

// For loop
for ($i = 0; $i < 10; $i++) {
    echo $i;
}
?>
```

### 9. Arrays
```php
<?php
// Indexed array
$colors = array("Red", "Green", "Blue");
echo $colors[0];  // Red

// Associative array
$person = array("name" => "John", "age" => 25);
echo $person["name"];  // John
?>
```

---

## 🔌 PHP and MySQL Connection

### Database Connection Credentials
```php
<?php
$servername = "localhost";   // Server address (XAMPP uses localhost)
$username = "root";          // Database username (default: root)
$password = "";              // Database password (default: empty)
$dbname = "om";              // Database name
?>
```

### Creating a Connection (Object-Oriented Style)
```php
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
```

### Creating a Connection (Procedural Style)
```php
<?php
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully!";
?>
```

### Closing the Connection
```php
<?php
// Object-Oriented
$conn->close();

// Procedural
mysqli_close($conn);
?>
```

---

## 📊 CRUD Operations

**CRUD** stands for: **C**reate, **R**ead, **U**pdate, **D**elete

### 1. CREATE (Insert Data)

**SQL Query:**
```sql
INSERT INTO items (item_id, title, artist, unit_price) 
VALUES (11, 'Best Hits', 'The Rockers', 19.99)
```

**PHP Code (Object-Oriented):**
```php
<?php
include 'connect.php';

$sql = "INSERT INTO items (item_id, title, artist, unit_price) 
        VALUES (11, 'Best Hits', 'The Rockers', 19.99)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
```

### 2. READ (Select Data)

**SQL Query:**
```sql
SELECT * FROM items
SELECT * FROM items WHERE item_id = 1
SELECT title, artist FROM items
```

**PHP Code (Object-Oriented):**
```php
<?php
include 'connect.php';

$sql = "SELECT * FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["item_id"] . "<br>";
        echo "Title: " . $row["title"] . "<br>";
        echo "Price: $" . $row["unit_price"] . "<br><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
```

**Explanation:**
- `$result->num_rows` - Number of rows returned
- `$result->fetch_assoc()` - Fetch next row as associative array
- `$row["column_name"]` - Access column value from current row

### 3. UPDATE (Modify Data)

**SQL Query:**
```sql
UPDATE items SET unit_price = 14.99 WHERE item_id = 2
```

**PHP Code (Object-Oriented):**
```php
<?php
include 'connect.php';

$sql = "UPDATE items SET unit_price = 14.99 WHERE item_id = 2";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo "Affected rows: " . mysqli_affected_rows($conn);
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
```

### 4. DELETE (Remove Data)

**SQL Query:**
```sql
DELETE FROM items WHERE item_id = 11
```

**PHP Code (Object-Oriented):**
```php
<?php
include 'connect.php';

$sql = "DELETE FROM items WHERE item_id = 11";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    echo "Affected rows: " . mysqli_affected_rows($conn);
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
```

---

## 🔄 Object-Oriented vs Procedural Style

PHP MySQLi supports two programming styles:

### Object-Oriented Style (OO)
Uses objects and methods (modern approach):

```php
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Execute query
$result = $conn->query($sql);

// Get number of rows
$count = $result->num_rows;

// Fetch data
$row = $result->fetch_assoc();

// Close connection
$conn->close();
?>
```

**Advantages:**
- More modern and cleaner syntax
- Better for large applications
- Easier to maintain and extend
- Popular in frameworks

### Procedural Style
Uses functions (traditional approach):

```php
<?php
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Execute query
$result = mysqli_query($conn, $sql);

// Get number of rows
$count = mysqli_num_rows($result);

// Fetch data
$row = mysqli_fetch_assoc($result);

// Close connection
mysqli_close($conn);
?>
```

**Advantages:**
- Simpler for beginners
- Similar to older PHP code
- Each function is independent

### Side-by-Side Comparison

| Operation | Object-Oriented | Procedural |
|-----------|----------------|------------|
| Connect | `new mysqli(...)` | `mysqli_connect(...)` |
| Query | `$conn->query($sql)` | `mysqli_query($conn, $sql)` |
| Row Count | `$result->num_rows` | `mysqli_num_rows($result)` |
| Fetch Row | `$result->fetch_assoc()` | `mysqli_fetch_assoc($result)` |
| Affected Rows | `mysqli_affected_rows($conn)` | `mysqli_affected_rows($conn)` |
| Close | `$conn->close()` | `mysqli_close($conn)` |

---

## 💡 Important Concepts

### 1. SQL Injection Prevention
**Never** directly insert user input into SQL queries:

```php
// ❌ UNSAFE - Don't do this!
$id = $_GET['id'];
$sql = "SELECT * FROM items WHERE item_id = $id";

// ✅ SAFE - Use prepared statements
$stmt = $conn->prepare("SELECT * FROM items WHERE item_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
```

### 2. Error Handling
Always check for errors:

```php
<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$result) {
    echo "Query failed: " . $conn->error;
}
?>
```

### 3. Data Types in SQL
When inserting data, remember:
- **Strings** need single quotes: `'Hello'`
- **Numbers** don't need quotes: `123`, `19.99`
- **NULL** doesn't need quotes: `NULL`

```php
// Correct
$sql = "INSERT INTO items VALUES (11, 'Title', 'Artist', 19.99)";

// Wrong - numbers in quotes as strings
$sql = "INSERT INTO items VALUES ('11', 'Title', 'Artist', '19.99')";
```

### 4. Column Names vs Values
```php
// Column names (no quotes in query structure)
$sql = "SELECT customer_id, customer_name FROM customers";

// Values (strings need quotes)
$sql = "INSERT INTO customers (name, city) VALUES ('John', 'NYC')";
```

---

## 🔍 Common MySQL Queries

### Select All
```sql
SELECT * FROM customers;
```

### Select Specific Columns
```sql
SELECT customer_first_name, customer_city FROM customers;
```

### Select with Condition
```sql
SELECT * FROM items WHERE unit_price > 15;
SELECT * FROM customers WHERE customer_city = 'New York';
```

### Select with Multiple Conditions
```sql
SELECT * FROM items WHERE unit_price > 15 AND artist = 'Umami';
SELECT * FROM customers WHERE customer_state = 'CA' OR customer_state = 'NY';
```

### Select with Sorting
```sql
SELECT * FROM items ORDER BY unit_price ASC;   -- Ascending
SELECT * FROM items ORDER BY unit_price DESC;  -- Descending
```

### Select with Limit
```sql
SELECT * FROM items LIMIT 5;  -- First 5 records
```

### Count Records
```sql
SELECT COUNT(*) FROM customers;
SELECT COUNT(*) FROM items WHERE unit_price > 15;
```

---

## 📚 Quick Reference

### PHP Basics
```php
<?php
// Variables
$variable = "value";

// Output
echo "text";

// Concatenation
$full = $first . " " . $last;

// Include files
include 'file.php';

// Conditional
if (condition) { }

// Loop
while (condition) { }
?>
```

### MySQL Connection
```php
<?php
// Connect
$conn = new mysqli($server, $user, $pass, $db);

// Query
$result = $conn->query($sql);

// Fetch
while ($row = $result->fetch_assoc()) {
    echo $row["column"];
}

// Close
$conn->close();
?>
```

### CRUD Queries
```sql
-- Create
INSERT INTO table (col1, col2) VALUES (val1, val2);

-- Read
SELECT * FROM table WHERE condition;

-- Update
UPDATE table SET col1 = val1 WHERE condition;

-- Delete
DELETE FROM table WHERE condition;
```

---

## 🎓 Learning Tips

1. **Practice with small examples** - Start with simple queries
2. **Test in phpMyAdmin first** - Run SQL queries before using in PHP
3. **Use echo for debugging** - Print variables to see their values
4. **Check for errors** - Always handle connection and query errors
5. **Read error messages** - They tell you what went wrong
6. **Comment your code** - Explain what each section does
7. **Use consistent style** - Pick OO or Procedural and stick with it

---

## 🆘 Debugging Tips

### Common Errors:

**"Connection failed"**
- Check XAMPP is running
- Verify database credentials
- Ensure database exists

**"Table doesn't exist"**
- Check spelling of table name
- Verify database is selected
- Import database if missing

**"Unknown column"**
- Check column name spelling
- Verify column exists in table
- Check case sensitivity

**"Syntax error in SQL"**
- Check SQL syntax
- Verify quotes around strings
- Check comma placement

**Blank page**
- Check PHP syntax errors
- Look at error logs
- Add `error_reporting(E_ALL);` at top of file

---

**Course:** SE212 Software Engineering  
**Topic:** PHP MySQL Fundamentals  
**Last Updated:** 2025
