# College Information Management System

A **PHP and MySQL based web application** designed to manage college-related information with user and admin authentication. This project is developed as an academic mini project for learning backend web development using PHP.

---

## 📌 Project Description

The **College Information Management System** allows users to:
- Register and log in
- Access college information
- Separate admin and user login
- Manage data securely using a MySQL database

The system demonstrates **role-based redirection**, form handling, and database connectivity.

---

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** Apache (XAMPP)  
- **Editor:** Visual Studio Code  

---

## 📂 Project Structure

college_info_management_system/
│
├── index.php # Main entry page (role selection)
├── login.php # User login
├── register.php # User registration
├── adminlogin.php # Admin login
├── homepage.php # User dashboard
├── college_details.php # College information page
├── action.php # Handles form actions
├── config.php # Database connection
├── logout.php # Logout functionality
├── style.css # CSS styling
└── README.md # Project documentation


---

## ⚙️ How to Run the Project (Localhost)

### 1️⃣ Install XAMPP
Download and install XAMPP from:  
https://www.apachefriends.org

### 2️⃣ Start Services
Open XAMPP Control Panel and start:
- Apache
- MySQL

### 3️⃣ Create Database
1. Go to:
3. Create required tables or import the SQL file (if available).

---

## 🔧 Database Configuration

Edit the `config.php` file if required:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "college_info_management_system";
