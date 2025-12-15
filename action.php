<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: adminlogin.php');
    exit;
}
$db_host = 'localhost';
$db_name = 'college_info_system';
$db_user = 'root';
$db_pass = '';
try {
    $pdo = new PDO(
        "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    die('Database connection failed.');
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: adminlogin.php');
    exit;
}

if (isset($_POST['create'])) {
    $branch_code = $_POST['branch_code'] ?? '';
    $branch_name = $_POST['branch_name'] ?? '';
    $intake = $_POST['intake'] ?? 0;
    $sq = $_POST['sq'] ?? 0;
    $aiqg = $_POST['aiqg'] ?? 0;
    $aiqj = $_POST['aiqj'] ?? 0;
    $filled = $_POST['filled'] ?? 0;
    $vacant = $_POST['vacant'] ?? 0;
    $academic_year = $_POST['academic_year'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO branches (university_id, branch_code, branch_name, intake, sq, aiqg, aiqj, filled, vacant, academic_year) VALUES (1, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$branch_code, $branch_name, $intake, $sq, $aiqg, $aiqj, $filled, $vacant, $academic_year]);
    header('Location: action.php?msg=created');
    exit;
}

if (isset($_POST['update'])) {
    $id = $_POST['id'] ?? 0;
    $branch_code = $_POST['branch_code'] ?? '';
    $branch_name = $_POST['branch_name'] ?? '';
    $intake = $_POST['intake'] ?? 0;
    $sq = $_POST['sq'] ?? 0;
    $aiqg = $_POST['aiqg'] ?? 0;
    $aiqj = $_POST['aiqj'] ?? 0;
    $filled = $_POST['filled'] ?? 0;
    $vacant = $_POST['vacant'] ?? 0;
    $academic_year = $_POST['academic_year'] ?? '';

    $stmt = $pdo->prepare("UPDATE branches SET branch_code=?, branch_name=?, intake=?, sq=?, aiqg=?, aiqj=?, filled=?, vacant=?, academic_year=? WHERE id=? AND university_id=1");
    $stmt->execute([$branch_code, $branch_name, $intake, $sq, $aiqg, $aiqj, $filled, $vacant, $academic_year, $id]);
    header('Location: action.php?msg=updated');
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM branches WHERE id=? AND university_id=1");
    $stmt->execute([$id]);
    header('Location: action.php?msg=deleted');
    exit;
}
$stmt = $pdo->query("SELECT * FROM branches WHERE university_id=1 ORDER BY id ASC");
$branches = $stmt->fetchAll(PDO::FETCH_ASSOC);

$msg = $_GET['msg'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>DDU Branches Admin Panel</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 1100px; margin: 40px auto; padding: 30px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        h2 { text-align: center; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
        .btn { padding: 6px 14px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .logout { float: right; }
        .msg { color: green; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <a href="action.php?logout=1" class="btn logout">Logout</a>
        <h2>DDU Branches Admin Panel</h2>
        <?php if ($msg): ?>
            <div class="msg"><?= htmlspecialchars($msg) ?> successfully!</div>
        <?php endif; ?>

        <h3>Add New Branch</h3>
        <form method="post" style="margin-bottom:30px;">
            <input type="text" name="branch_code" placeholder="Branch Code" required>
            <input type="text" name="branch_name" placeholder="Branch Name" required>
            <input type="number" name="intake" placeholder="Intake" required>
            <input type="number" name="sq" placeholder="SQ" required>
            <input type="number" name="aiqg" placeholder="AIQG" required>
            <input type="number" name="aiqj" placeholder="AIQJ" required>
            <input type="number" name="filled" placeholder="Filled" required>
            <input type="number" name="vacant" placeholder="Vacant" required>
            <input type="text" name="academic_year" placeholder="Academic Year" required>
            <button type="submit" name="create" class="btn">Add Branch</button>
        </form>

        <h3>Branch List</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Branch Code</th>
                <th>Branch Name</th>
                <th>Intake</th>
                <th>SQ</th>
                <th>AIQG</th>
                <th>AIQJ</th>
                <th>Filled</th>
                <th>Vacant</th>
                <th>Academic Year</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($branches as $row): ?>
            <tr>
                <form method="post">
                    <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                    <td><input type="text" name="branch_code" value="<?= htmlspecialchars($row['branch_code']) ?>"></td>
                    <td><input type="text" name="branch_name" value="<?= htmlspecialchars($row['branch_name']) ?>"></td>
                    <td><input type="number" name="intake" value="<?= $row['intake'] ?>"></td>
                    <td><input type="number" name="sq" value="<?= $row['sq'] ?>"></td>
                    <td><input type="number" name="aiqg" value="<?= $row['aiqg'] ?>"></td>
                    <td><input type="number" name="aiqj" value="<?= $row['aiqj'] ?>"></td>
                    <td><input type="number" name="filled" value="<?= $row['filled'] ?>"></td>
                    <td><input type="number" name="vacant" value="<?= $row['vacant'] ?>"></td>
                    <td><input type="text" name="academic_year" value="<?= htmlspecialchars($row['academic_year']) ?>"></td>
                    <td>
                        <button type="submit" name="update" class="btn">Update</button>
                        <a href="action.php?delete=<?= $row['id'] ?>" class="btn" style="background:#d8000c;" onclick="return confirm('Delete this branch?');">Delete</a>
                    </td>
                </form>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
