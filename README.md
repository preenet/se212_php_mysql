# SE212 PHP MySQL Project

## Description
A simple PHP project demonstrating MySQL database connectivity using XAMPP.

## Prerequisites
- XAMPP (Apache + MySQL)
- PHP 7.0 or higher
- MySQL database

## Database Setup
1. Start XAMPP Apache and MySQL servers
2. Create a database named `om` in phpMyAdmin
3. Ensure MySQL is running on `localhost` with default credentials

## Project Structure
```
se212_php_mysql/
├── connect.php          # Database connection (OO style)
├── connect1.php         # Database connection (Procedural style)
├── read.php            # Query execution using OO style
├── read1.php           # Query execution using Procedural style
├── data/
│   └── create_db_om.sql # Database schema and sample data
├── README.md           # Project documentation
└── .gitignore          # Git ignore file
```

## Files Description
- `connect.php` - Database connection using Object-Oriented (OO) style with `new mysqli()`
- `connect1.php` - Database connection using Procedural style with `mysqli_connect()`
- `read.php` - Executes SELECT query using OO methods (`$conn->query()`)
- `read1.php` - Executes SELECT query using Procedural functions (`mysqli_query()`)
- `data/create_db_om.sql` - SQL script to create the OM database with tables (customers, items, orders, order_details) and sample data

## Installation

### Step 1: Clone the Repository
```bash
cd C:\xampp\htdocs
git clone https://github.com/preenet/se212_php_mysql.git
```

### Step 2: Set Up the Database
1. Start XAMPP Control Panel and start **Apache** and **MySQL** services
2. Open phpMyAdmin: `http://localhost/phpmyadmin`
3. Import the database:
   - Click on "Import" tab
   - Choose file: `data/create_db_om.sql`
   - Click "Go" to execute
   - This will create the `om` database with all tables and sample data

### Step 3: Run the Project
Access the files in your browser:
- **Connection test (OO style)**: `http://localhost/se212_php_mysql/connect.php`
- **Read data (OO style)**: `http://localhost/se212_php_mysql/read.php`
- **Read data (Procedural style)**: `http://localhost/se212_php_mysql/read1.php`

## Configuration
Database credentials are set in `connect.php`:
- Server: `localhost`
- Username: `root`
- Password: `` (empty)
- Database: `om`

## Usage
Run `connect.php` in your browser to test the database connection. A successful connection will display "Connected successfully!"

## Author
Student Project for SE212
