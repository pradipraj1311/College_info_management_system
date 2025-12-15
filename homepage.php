<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location:login.php");
    exit;
}

include 'config.php';

$search = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = trim($_POST['search']);
    $sql = "SELECT * FROM universities WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $like = "%" . $search . "%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM universities";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Information Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header style="position: relative;">
        <h1>College Information Management System</h1>
        <div style="position: absolute; top: 20px; right: 20px;">
            Logged in as <b><?php echo htmlspecialchars($_SESSION['email']); ?></b>
            <form action="logout.php" method="post" style="display:inline;">
                <button type="submit" style="margin-left: 10px;">Logout</button>
            </form>
        </div>
    </header>
    
    <main class="home-page">
        <h2>Select College</h2>
        
        <form method="post" action="homepage.php">
            <input type="text" name="search" placeholder="Search college by name" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
        
        <div class="college-list">
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<a href="college_details.php?id=' . $row["id"] . '" class="college-btn">';
                    echo htmlspecialchars($row["name"]);
                    echo '</a>';
                }
            } else {
                echo "No colleges found in the database.";
            }
            ?>
        </div>
    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> College Information Management System</p>
    </footer>
</body>
</html>
