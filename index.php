<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['role'])) {
        if ($_POST['role'] === 'user') {
            header("Location: register.php");
            exit;
        } elseif ($_POST['role'] === 'admin') {
            header("Location: adminlogin.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>College Information Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to College Information Management System</h2>
        <form method="post" action="">
            <div class="form-group">
                <label><input type="radio" name="role" value="user" required> User</label>
                <label><input type="radio" name="role" value="admin" required> Admin</label>
            </div>
            <div class="form-group" style="text-align:center;">
                <button type="submit" class="btn">Continue</button>
            </div>
        </form>
    </div>
<style>
body {
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
}
.container {
    max-width: 400px;
    margin: 80px auto;
    padding: 30px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px #ccc;
}
h2 {
    text-align: center;
}
.form-group {
    margin: 20px 0;
}
.form-group label {
    margin-right: 10px;
}
.btn {
    padding: 10px 20px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.btn:hover {
    background: #0056b3;
}
</style>
</body>
</html>
