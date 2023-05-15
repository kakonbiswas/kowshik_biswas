<!DOCTYPE html>
<html>
<head>
	<title>Find Result</title>
	<style>
		form {
			margin: 20px auto;
			width: 50%;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="text"],
		select {
			width: 100%;
			padding: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 10px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		table {
			margin: 20px auto;
			border-collapse: collapse;
		}
		th, td {
			padding: 5px;
			border: 1px solid #ccc;
			text-align: center;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>
	<form action="" method="post">
		<label for="id">ID:</label>
		<input type="text" id="id" name="id">
		<label for="level_term">Level & Term:</label>
		<select id="level_term" name="level_term">
			<option value="1,1">Level 1, Term 1</option>
			<option value="1,2">Level 1, Term 2</option>
			<option value="2,1">Level 2, Term 1</option>
			<option value="2,2">Level 2, Term 2</option>
			<option value="3,1">Level 3, Term 1</option>
			<option value="3,2">Level 3, Term 2</option>
			<option value="4,1">Level 4, Term 1</option>
			<option value="4,2">Level 4, Term 2</option>
		</select>
		<input type="submit" value="Find Result">
	</form>
</body>
</html>
<?php
// Establish a connection to the database
include('connection.php');
error_reporting(0);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $level_term = $_POST["level_term"];

    // Construct the SQL query to find the result
    $sql = "SELECT * FROM result WHERE id='$id' AND level_term='$level_term'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Display the result
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Level Term</th><th>Name</th><th>Roll</th><th>Artificial Intelligence</th><th>Mathematical Analysis</th>
		<th>Computer Network</th><th>Environment System</th><th>Operating System</th>
		<th>Arifician Intelligence(Sessional)</th><th>Network(Sessional)</th><th>Environment System(sessional)</th>
		<th>Operating System(Sessional)</th><th>Attendance</th><th>Total</th><th>Grade</th>

		</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["level_term"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["roll"] . "</td>";
            echo "<td>" . $row["a_i"] . "</td>";
            echo "<td>" . $row["m_a"] . "</td>";
            echo "<td>" . $row["network"] . "</td>";
            echo "<td>" . $row["e_s"] . "</td>";
            echo "<td>" . $row["o_s"] . "</td>";
            echo "<td>" . $row["a_i_s"] . "</td>";
            echo "<td>" . $row["network_s"] . "</td>";
			echo "<td>" . $row["e_s_s"] . "</td>";
            echo "<td>" . $row["o_s_s"] . "</td>";
            echo "<td>" . $row["attendance"] . "</td>";
            echo "<td>" . $row["total"] . "</td>";
            echo "<td>" . $row["grade"] . "</td>";
           
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No result found for ID $id and Level Term $level_term.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>