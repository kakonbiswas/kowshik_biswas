<?php
// Connect to database and retrieve data
include('connection.php');



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, level_term, name, roll, a_i,m_a,network,e_s,o_s,a_i_s,network_s,e_s_s,o_s_s,attendance,total,grade FROM result ORDER BY level_term, total DESC";
$result = $conn->query($sql);

// Calculate rank for each row
$prev_level_term = '';
$rank = 1;
$ranked_data = array();
while ($row = $result->fetch_assoc()) {
    if ($row['level_term'] !== $prev_level_term) {
        $rank = 1;
    }
    $row['rank'] = $rank;
    $rank++;
    $ranked_data[] = $row;
    $prev_level_term = $row['level_term'];
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Top Three Positions</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .first-place {
            background-color: #ffc107;
        }

        .second-place {
            background-color: #cfd8dc;
        }

        .third-place {
            background-color: #ffccbc;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Total Marks</th>
                <th>Level Term</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ranked_data as $row) : ?>
                <?php if ($row['rank'] <= 3) : ?>
                    <tr<?php if ($row['rank'] == 1) echo ' class="first-place"'; elseif ($row['rank'] == 2) echo ' class="second-place"'; elseif ($row['rank'] == 3) echo ' class="third-place"'; ?>>
                        <td><?php echo $row['rank']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['roll']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['level_term']; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
