<!DOCTYPE html>
<html>
<head>
	<title>Insert Data Form</title>
	<style>
		label {
			display: inline-block;
			width: 100px;
			margin-bottom: 10px;
		}
		input[type="submit"] {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<h1>Insert Data Form</h1>
	<form method="post" action="insert.php">
		<label for="id">ID:</label>
		<input type="text" id="id" name="id"><br>

		<label for="level_term">Level/Term:</label>
		<input type="text" id="level_term" name="level_term"><br>

		<label for="name">Name:</label>
		<input type="text" id="name" name="name"><br>

		<label for="roll">Roll:</label>
		<input type="text" id="roll" name="roll"><br>

		<label for="a_i">A_I:</label>
		<input type="text" id="a_i" name="a_i"><br>

		<label for="m_a">M_A:</label>
		<input type="text" id="m_a" name="m_a"><br>

		<label for="network">Network:</label>
		<input type="text" id="network" name="network"><br>

		<label for="e_s">E_S:</label>
		<input type="text" id="e_s" name="e_s"><br>

		<label for="o_s">O_S:</label>
		<input type="text" id="o_s" name="o_s"><br>

		<label for="a_i_s">A_I_S:</label>
		<input type="text" id="a_i_s" name="a_i_s"><br>

		<label for="network_s">Network_S:</label>
		<input type="text" id="network_s" name="network_s"><br>

		<label for="e_s_s">E_S_S:</label>
		<input type="text" id="e_s_s" name="e_s_s"><br>

		<label for="o_s_s">O_S_S:</label>
		<input type="text" id="o_s_s" name="o_s_s"><br>

		<label for="attendance">Attendance:</label>
		<input type="text" id="attendance" name="attendance"><br>

		

		<input type="submit" value="Submit">
	</form>

    <?php
// Define database connection variables
include('connection.php');

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $level_term = $_POST["level_term"];
    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $attendance = $_POST["attendance"];

    // Check if the ID already exists in the database
    $sql = "SELECT * FROM result WHERE id='$roll'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Error: ID already exists in the database!";
    } else {
        // Calculate marks based on attendance
        if ($attendance >= 1 && $attendance <= 5) {
            $marks = 2;
        } elseif ($attendance >= 6 && $attendance <= 10) {
            $marks = 4;
        } elseif ($attendance >= 11 && $attendance <= 15) {
            $marks = 5;
        } else {
            $marks = 0;
        }

        // Calculate total marks
        $total = $_POST["a_i"] + $_POST["m_a"] + $_POST["network"] + $_POST["e_s"] + $_POST["o_s"] + $_POST["a_i_s"] + $_POST["network_s"] + $_POST["e_s_s"] + $_POST["o_s_s"] + $marks;

        // Calculate grade
        if ($total >= 720) {
            $grade = "A+";
        } elseif ($total >= 630) {
            $grade = "A";
        } elseif ($total >= 540) {
            $grade = "A-";
        } elseif ($total >= 450) {
            $grade = "B";
        } elseif ($total >= 240) {
            $grade = "C";
        } else {
            $grade = "F";
        }

        // Insert data into database
        $sql = "INSERT INTO result (id, level_term, name, roll, a_i, m_a, network, e_s, o_s, a_i_s, network_s, e_s_s, o_s_s, attendance, total, grade) VALUES ('$roll', '$level_term', '$name', '$roll', '{$_POST['a_i']}', '{$_POST['m_a']}', '{$_POST['network']}', '{$_POST['e_s']}', '{$_POST['o_s']}', '{$_POST['a_i_s']}', '{$_POST['network_s']}', '{$_POST['e_s_s']}', '{$_POST['o_s_s']}', '$attendance', '$total', '$grade')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>
















</body>
</html>
