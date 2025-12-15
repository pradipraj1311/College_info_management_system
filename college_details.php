<?php
include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'information';

$sql = "SELECT * FROM universities WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$college = $result->fetch_assoc();

if (!$college) {
    die("College not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $college['name']; ?> - College Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="back-button">
            <a href="homepage.php">← Back</a>
        </div>
        <h1><?php echo $college['short_name']; ?>, <?php echo !empty($college['address']) ? explode(' ', explode(',', $college['address'])[1])[0] : ''; ?></h1>
        <div class="favorite-icon">
            <span class="star">☆</span>
        </div>
    </header>
    
    <nav class="tabs">
        <a href="?id=<?php echo $id; ?>&tab=information" class="<?php echo $tab == 'information' ? 'active' : ''; ?>">Information</a>
        <a href="?id=<?php echo $id; ?>&tab=intake" class="<?php echo $tab == 'intake' ? 'active' : ''; ?>">Intake</a>
        <a href="?id=<?php echo $id; ?>&tab=cutoff" class="<?php echo $tab == 'cutoff' ? 'active' : ''; ?>">Cutoff</a>
        <a href="?id=<?php echo $id; ?>&tab=jee_cutoff" class="<?php echo $tab == 'jee_cutoff' ? 'active' : ''; ?>">JEE Cutoff</a>
        <a href="?id=<?php echo $id; ?>&tab=placement" class="<?php echo $tab == 'placement' ? 'active' : ''; ?>">Placement</a>
    </nav>
    
    <main>
        <?php if ($tab == 'information'): ?>
            <!-- Information Tab -->
            <div class="tab-content">
                <h2><?php echo $college['full_name']; ?></h2>
                
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Type</div>
                        <div class="info-value"><?php echo $college['type']; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Fees / Year</div>
                        <div class="info-value"><?php echo number_format($college['fees_per_year']); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">University</div>
                        <div class="info-value"><?php echo explode(' ', $college['short_name'])[0]; ?></div>
                    </div>
                </div>
                
                <div class="contact-info">
                    <?php if(!empty($college['address'])): ?>
                    <div class="info-item">
                        <div class="icon">📍</div>
                        <div class="text"><?php echo $college['address']; ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($college['phone'])): ?>
                    <div class="info-item">
                        <div class="icon">📞</div>
                        <div class="text"><?php echo $college['phone']; ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($college['website'])): ?>
                    <div class="info-item">
                        <div class="icon">🌐</div>
                        <div class="text"><?php echo $college['website']; ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($college['email'])): ?>
                    <div class="info-item">
                        <div class="icon">✉️</div>
                        <div class="text"><?php echo $college['email']; ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($college['established_year'])): ?>
                    <div class="info-item">
                        <div class="icon">📅</div>
                        <div class="text">Established in <?php echo $college['established_year']; ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($college['location_url'])): ?>
                    <div class="info-item">
                        <div class="icon">🗺️</div>
                        <div class="text"><a href="<?php echo $college['location_url']; ?>" target="_blank">Open in Google Map</a></div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php
                $sql = "SELECT branch_code, intake FROM branches WHERE university_id = ? AND branch_code = 'CE'";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $computer_seats = $result->fetch_assoc();
                ?>
               
            </div>

        <?php elseif ($tab == 'intake'): ?>
            <div class="tab-content">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Branch</th>
                            <th>Intake</th>
                            <th>SQ</th>
                            <th>AIQG</th>
                            <th>AIQJ</th>
                            <th>Filled</th>
                            <th>Vacant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM branches WHERE university_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        $total_intake = 0;
                        $total_sq = 0;
                        $total_aiqg = 0;
                        $total_aiqj = 0;
                        $total_filled = 0;
                        $total_vacant = 0;
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['branch_code'] . "</td>";
                            echo "<td>" . $row['intake'] . "</td>";
                            echo "<td>" . $row['sq'] . "</td>";
                            echo "<td>" . $row['aiqg'] . "</td>";
                            echo "<td>" . $row['aiqj'] . "</td>";
                            echo "<td>" . $row['filled'] . "</td>";
                            echo "<td class='vacant'>" . $row['vacant'] . "</td>";
                            echo "</tr>";
                            
                            $total_intake += $row['intake'];
                            $total_sq += $row['sq'];
                            $total_aiqg += $row['aiqg'];
                            $total_aiqj += $row['aiqj'];
                            $total_filled += $row['filled'];
                            $total_vacant += $row['vacant'];
                        }
                        ?>
                        <tr class="total-row">
                            <td>Total</td>
                            <td><?php echo $total_intake; ?></td>
                            <td><?php echo $total_sq; ?></td>
                            <td><?php echo $total_aiqg; ?></td>
                            <td><?php echo $total_aiqj; ?></td>
                            <td><?php echo $total_filled; ?></td>
                            <td class="vacant"><?php echo $total_vacant; ?></td>
                        </tr>
                    </tbody>
                </table>
                
                <?php
                $sql = "SELECT description FROM intake_metadata WHERE university_id = ? ORDER BY academic_year DESC LIMIT 1";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $metadata = $result->fetch_assoc();
                
                if ($metadata) {
                    echo '<div class="metadata">';
                    echo nl2br($metadata['description']);
                    echo '</div>';
                }
                ?>
            </div>

        <?php elseif ($tab == 'cutoff'): ?>
            <div class="tab-content">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Branch</th>
                            <th>TFWS</th>
                            <th>OPEN</th>
                            <th>EWS</th>
                            <th>SEBC</th>
                            <th>SC</th>
                            <th>ST</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM cutoff_data WHERE university_id = ? ORDER BY FIELD(branch_code, 'CE', 'EC', 'CHEM', 'IC', 'CIVIL')";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['branch_code'] . "</td>";
                            echo "<td>" . ($row['tfws'] ? $row['tfws'] : '-') . "</td>";
                            echo "<td>" . ($row['open'] ? $row['open'] : '-') . "</td>";
                            echo "<td>" . ($row['ews'] ? $row['ews'] : '-') . "</td>";
                            echo "<td>" . ($row['sebc'] ? $row['sebc'] : '-') . "</td>";
                            echo "<td>" . ($row['sc'] ? $row['sc'] : '-') . "</td>";
                            echo "<td>" . ($row['st'] ? $row['st'] : '-') . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
               
            </div>

        <?php elseif ($tab == 'jee_cutoff'): ?>
            <div class="tab-content">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Branch</th>
                            <th>TFWS</th>
                            <th>OPEN</th>
                            <th>EWS</th>
                            <th>SEBC</th>
                            <th>SC</th>
                            <th>ST</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM jee_cutoff WHERE university_id = ? ORDER BY FIELD(branch_code, 'CE', 'EC', 'CHEM', 'IC', 'CIVIL')";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['branch_code'] . "</td>";
                            echo "<td>" . ($row['tfws'] ? $row['tfws'] : '-') . "</td>";
                            echo "<td>" . ($row['open'] ? $row['open'] : '-') . "</td>";
                            echo "<td>" . ($row['ews'] ? $row['ews'] : '-') . "</td>";
                            echo "<td>" . ($row['sebc'] ? $row['sebc'] : '-') . "</td>";
                            echo "<td>" . ($row['sc'] ? $row['sc'] : '-') . "</td>";
                            echo "<td>" . ($row['st'] ? $row['st'] : '-') . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div>Data not available </div>
               
            </div>

        <?php elseif ($tab == 'placement'): ?>
            <div class="tab-content">
                <?php
                $sql = "SELECT * FROM placement_data WHERE university_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    echo '<table class="data-table">
                          <thead>
                            <tr>
                              <th>Branch</th>
                              <th>Placement %</th>
                              <th>Avg Package (LPA)</th>
                              <th>Highest Package (LPA)</th>
                            </tr>
                          </thead>
                          <tbody>';
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['branch_code'] . "</td>";
                        echo "<td>" . $row['placement_percentage'] . "%</td>";
                        echo "<td>" . $row['avg_package'] . "</td>";
                        echo "<td>" . $row['highest_package'] . "</td>";
                        echo "</tr>";
                    }
                    
                    echo '</tbody></table>';
                } else {
                    echo '<p>Placement data is currently not available for this institution.</p>';
                }
                ?>
            </div>
        <?php endif; ?>
    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> College Information Management System</p>
    </footer>
</body>
</html>
