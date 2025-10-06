# SE212 PHP MySQL - Class Activity

## 📚 Overview
This activity is designed for students who have successfully run all the example files and want to practice CRUD operations on their own.

## ✅ Prerequisites
Before starting these exercises, make sure you have:
- ✅ Completed all steps in README.md
- ✅ Successfully imported the `om` database
- ✅ Tested all example files through `index.php`
- ✅ Apache and MySQL running in XAMPP

---

## 📊 Database Quick Reference

The `om` database has an **items** table with the following columns:
- `item_id` (INT) - Primary Key
- `title` (VARCHAR) - Item title/name
- `artist` (VARCHAR) - Artist name
- `unit_price` (DECIMAL) - Price

Currently, there are 10 items in the database (item_id 1-10).

---

## 🏋️ Exercise 1: Display All Items (READ Operation)

### 📝 Task
Create a new file called `read_items.php` that displays all items from the **items** table.

### 🎯 Requirements
1. Use the Object-Oriented style (like `read.php`)
2. Include `header.php` and `footer.php`
3. Display: Item ID, Title, Artist, and Unit Price
4. Show total number of items found

### 💡 Hints
- Start by copying `read.php` as a template
- Change the table name from `customers` to `items`
- The query should be: `SELECT * FROM items`
- Display the columns: `item_id`, `title`, `artist`, `unit_price`

### ✅ Expected Output
```
Item ID: 1, Title: Umami In Concert, Artist: Umami, Price: $17.95
Item ID: 2, Title: Race Car Sounds, Artist: The Ubernerds, Price: $13.00
... (8 more items)
Total items: 10
```

### 🧪 Test Your Code
Access: `http://localhost/se212_php_mysql/read_items.php`

---

## 🏋️ Exercise 2: Add a New Item (CREATE Operation)

### 📝 Task
Create a new file called `create_item.php` that inserts a new item into the **items** table and displays all items.

### 🎯 Requirements
1. Insert a new item with these details:
   - Item ID: `11`
   - Title: `"Best Hits 2024"`
   - Artist: `"The Rockers"`
   - Unit Price: `19.99`
2. Display success message
3. Show all items including the new one

### 💡 Hints
- Use `create.php` as a template
- INSERT query format: `INSERT INTO items (item_id, title, artist, unit_price) VALUES (...)`
- After inserting, select and display all items

### ✅ Expected Output
```
Successfully created 1 record(s).
Item ID: 1, Title: Umami In Concert, Artist: Umami, Price: $17.95
... (previous items)
Item ID: 11, Title: Best Hits 2024, Artist: The Rockers, Price: $19.99
Total items: 11
```

### 🧪 Test Your Code
Access: `http://localhost/se212_php_mysql/create_item.php`

---

## 💡 Common Mistakes to Avoid
- ❌ Forgetting to include `connect.php`
- ❌ Wrong table name (items not item)
- ❌ Missing single quotes around string values in SQL
- ❌ Wrong column names (check spelling!)

---

**Course:** SE212 Software Engineering  
**Estimated Time:** 30 minutes
