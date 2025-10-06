# SE212 PHP MySQL Project

## 📚 Project Overview
This is a comprehensive learning project for **SE212 Software Engineering** course that demonstrates fundamental database operations using PHP and MySQL. The project covers all CRUD (Create, Read, Update, Delete) operations with the Order Management (OM) database, teaching students how to interact with databases using both Object-Oriented and Procedural approaches.

## 🎯 Learning Objectives
By completing this project, students will learn:
- How to connect PHP applications to MySQL databases
- How to perform CRUD operations (Create, Read, Update, Delete)
- Difference between Object-Oriented (OO) and Procedural programming styles in PHP
- How to execute SQL queries from PHP
- Basic database management using phpMyAdmin
- Working with relational database structures

## 📋 Prerequisites
Before starting this project, ensure you have:
- **XAMPP** installed (includes Apache server, MySQL database, and PHP)
- Basic knowledge of PHP programming
- Basic understanding of SQL queries
- A web browser (Chrome, Firefox, or Edge)
- A code editor (VS Code, Sublime Text, or Notepad++)

## 📖 New to PHP and MySQL?
**If you're new to PHP and MySQL, please read [BASIC_PHP.md](BASIC_PHP.md) first!**

This guide covers:
- What is PHP and MySQL
- PHP basic syntax (variables, echo, loops, etc.)
- How to connect PHP to MySQL
- CRUD operations explained with examples
- Object-Oriented vs Procedural style comparison
- Common SQL queries and debugging tips

Reading this guide first will help you better understand the code in this project.

## 🗂️ Project Structure
```
se212_php_mysql/
├── index.php             # Main menu with links to all operations
├── header.php            # HTML header with styling
├── footer.php            # HTML footer with closing tags
├── connect.php           # Database connection (Object-Oriented style)
├── read.php              # READ operation - Display all customers (OO style with header/footer)
├── read1.php             # READ operation - Display all customers (Procedural style)
├── create.php            # CREATE operation - Insert new customer
├── update.php            # UPDATE operation - Modify customer data
├── delete.php            # DELETE operation - Remove customer record
├── data/
│   └── create_db_om.sql  # Database schema and sample data
├── solution/             # Solutions for class activities
│   ├── read_items.php    # Solution for Exercise 1
│   ├── create_item.php   # Solution for Exercise 2
│   └── README.md         # Solution documentation
├── BASIC_PHP.md          # ⭐ PHP & MySQL basics guide (read this first!)
├── ACTIVITY.md           # Class activity exercises
├── README.md             # This file - Project documentation
└── .gitignore            # Git ignore file
```

## 📖 Database Structure
The project uses an **Order Management (OM)** database with the following tables:
- **customers** - Customer information (ID, name, address, phone, etc.)
- **items** - Product/item catalog (ID, title, artist, price)
- **orders** - Order records (order ID, customer ID, dates)
- **order_details** - Order line items (linking orders and items)

## 🚀 Getting Started - Step by Step

### Step 1: Install XAMPP
1. Download XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org)
2. Install XAMPP in the default location: `C:\xampp`
3. Run the XAMPP Control Panel

### Step 2: Get the Project Files

**Option A: Clone with Git (Recommended)**
```bash
cd C:\xampp\htdocs
git clone https://github.com/preenet/se212_php_mysql.git
```

**Option B: Manual Download**
1. Download the project as ZIP from GitHub
2. Extract to `C:\xampp\htdocs\se212_php_mysql`

### Step 3: Start XAMPP Services
1. Open **XAMPP Control Panel**
2. Click **Start** button for **Apache** module
3. Click **Start** button for **MySQL** module
4. Both should show green "Running" status

### Step 4: Create the Database
1. Open your web browser and go to: `http://localhost/phpmyadmin`
2. Click on **Import** tab in the top menu
3. Click **Choose File** button
4. Navigate to `C:\xampp\htdocs\se212_php_mysql\data\create_db_om.sql`
5. Click **Go** button at the bottom
6. You should see a success message
7. Click on **om** database in the left sidebar to verify tables were created

### Step 5: Access the Project
Open your browser and visit the main menu:
```
http://localhost/se212_php_mysql/index.php
```
You should see a menu with links to all available operations.

### Step 6: Test the Connection
Click on "Test Database Connection" or visit directly:
```
http://localhost/se212_php_mysql/connect.php
```
You should see MySQL version information, confirming successful connection.

## 🧪 Testing Each Operation

**TIP:** Use the main menu at `http://localhost/se212_php_mysql/index.php` to easily navigate between operations!

### 1. **READ Operation (Display Data)**
Test the read functionality to see all customers:

**Object-Oriented Style (with styled header/footer):**
```
http://localhost/se212_php_mysql/read.php
```
- Uses OO methods: `$conn->query()`, `$result->num_rows`, `$result->fetch_assoc()`
- Includes header and footer for better presentation

**Procedural Style (plain output):**
```
http://localhost/se212_php_mysql/read1.php
```
- Uses procedural functions: `mysqli_query()`, `mysqli_num_rows()`, `mysqli_fetch_assoc()`
- Simple output without styling

**Expected Output:** List of customer IDs and first names

### 2. **CREATE Operation (Insert Data)**
```
http://localhost/se212_php_mysql/create.php
```
**What it does:** Adds a new customer "Antony Lee" to the database and displays all customers

**Expected Output:** Success message showing 1 record created, followed by customer list

### 3. **UPDATE Operation (Modify Data)**
```
http://localhost/se212_php_mysql/update.php
```
**What it does:** Updates the fax number for customer "Johnathon"

**Expected Output:** Success message showing how many records were updated

### 4. **DELETE Operation (Remove Data)**
```
http://localhost/se212_php_mysql/delete.php
```
**What it does:** Removes the customer "Antony Lee" from the database

**Expected Output:** Success message showing how many records were deleted

## 📝 Understanding the Code

### Database Connection (`connect.php`)
```php
$servername = "localhost";  // MySQL server address
$username = "root";         // Default XAMPP username
$password = "";             // Default XAMPP has no password
$dbname = "om";             // Our database name

// Create connection using Object-Oriented style
$conn = new mysqli($servername, $username, $password, $dbname);
```

### Object-Oriented vs Procedural Style

This project demonstrates both programming styles to help you understand different approaches to PHP MySQL programming.

#### **read.php (Object-Oriented Style)**
```php
// Execute query - method call on object
$result = $conn->query($sql);

// Get number of rows - property access
if ($result->num_rows > 0) {
    // Fetch data - method call
    while ($row = $result->fetch_assoc()) {
        echo $row["customer_id"];
    }
}

// Close connection - method call
$conn->close();
```

#### **read1.php (Procedural Style)**
```php
// Execute query - function with connection parameter
$result = mysqli_query($conn, $sql);

// Get number of rows - function call
if (mysqli_num_rows($result) > 0) {
    // Fetch data - function call
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["customer_id"];
    }
}

// Close connection - function call
mysqli_close($conn);
```

#### **Key Differences**

| Operation | Object-Oriented (read.php) | Procedural (read1.php) |
|-----------|----------------------------|------------------------|
| Execute Query | `$conn->query($sql)` | `mysqli_query($conn, $sql)` |
| Count Rows | `$result->num_rows` | `mysqli_num_rows($result)` |
| Fetch Data | `$result->fetch_assoc()` | `mysqli_fetch_assoc($result)` |
| Close Connection | `$conn->close()` | `mysqli_close($conn)` |
| Syntax Style | Object methods/properties | Functions with parameters |
| Presentation | Includes header/footer | Plain output only |

**Both produce the same result**, but demonstrate different coding approaches. Modern PHP typically uses the Object-Oriented style.

## 🔧 Common Issues and Solutions

### Issue 1: "Connection failed"
**Solution:** Make sure Apache and MySQL are running in XAMPP Control Panel

### Issue 2: "Database 'om' not found"
**Solution:** Import the `create_db_om.sql` file again through phpMyAdmin

### Issue 3: "localhost/se212_php_mysql not found"
**Solution:** Check that files are in `C:\xampp\htdocs\se212_php_mysql`

### Issue 4: Port 80 or 3306 already in use
**Solution:** 
- For Apache (Port 80): Stop Skype or other services using port 80
- For MySQL (Port 3306): Stop other MySQL services

## 💡 Learning Activities

**Ready to practice?** Complete the hands-on exercises in [ACTIVITY.md](ACTIVITY.md)!

The activity includes 2 simple exercises where you will:
- Create `read_items.php` to display all items from the database
- Create `create_item.php` to add a new item to the database

Solutions are available in the `solution/` folder for reference after you complete the exercises.

### Additional Practice Ideas:

### Activity 1: Modify the CREATE Operation
Try changing the customer data in `create.php` to insert your own information

### Activity 2: Add More Fields to Display
Modify `read.php` to display customer address and phone number

### Activity 3: Create a New UPDATE Query
Modify `update.php` to update a different customer's information

### Activity 4: Experiment with SQL Queries
Open phpMyAdmin and try running SQL queries directly in the SQL tab

## 🎓 Next Steps
After mastering this project, you can:
- Add HTML forms for user input instead of hardcoded values
- Implement data validation and security (SQL injection prevention)
- Create a complete web interface with HTML/CSS
- Add user authentication and sessions
- Implement pagination for large datasets
- Learn about prepared statements for better security

## 📚 Additional Resources
- [PHP MySQL Tutorial](https://www.w3schools.com/php/php_mysql_intro.asp)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [XAMPP Documentation](https://www.apachefriends.org/docs/)

## 👨‍🏫 For Instructors
This project is designed for introductory database programming courses. Each file demonstrates a specific CRUD operation, making it easy to teach concepts incrementally.

## 📧 Support
If you encounter issues, please:
1. Check the "Common Issues and Solutions" section above
2. Verify all steps were followed correctly
3. Contact your instructor or TA for assistance

## 📄 License
Educational use for SE212 Software Engineering Course

---
**Course:** SE212 Software Engineering  
**Topic:** PHP MySQL Database Operations  
**Author:** Student Learning Project
