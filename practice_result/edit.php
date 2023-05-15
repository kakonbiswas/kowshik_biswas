<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>


form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 50px;
}

label {
  margin-top: 10px;
  font-weight: bold;
}

input {
  margin-top: 5px;
  padding: 5px;
  border-radius: 3px;
  border: 1px solid #ccc;
}

button {
  margin-top: 20px;
  padding: 5px 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button:hover {
  background-color: #3e8e41;
}

</style>







</head>
<body>
<?php



// Database connection settings
include('connection.php');
error_reporting(0);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form data
    $id = $_POST['id'];
    $level_term = $_POST['level_term'];
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $a_i = $_POST['a_i'];
    $m_a = $_POST['m_a'];
    $network = $_POST['network'];
    $e_s = $_POST['e_s'];
    $o_s = $_POST['o_s'];
    $a_i_s = $_POST['a_i_s'];
    $network_s = $_POST['network_s'];
    $e_s_s = $_POST['e_s_s'];
    $o_s_s = $_POST['o_s_s'];
    $attendance = $_POST['attendance'];
    $total = $_POST['total'];
    $grade = $_POST['grade'];

    // Update data in database
    $sql = "UPDATE result SET level_term='$level_term', name='$name', roll='$roll', a_i='$a_i', m_a='$m_a', network='$network', e_s='$e_s', o_s='$o_s', a_i_s='$a_i_s', network_s='$network_s', e_s_s='$e_s_s', o_s_s='$o_s_s', attendance='$attendance', total='$total', grade='$grade' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

}

// Get the id from the URL
$id = $_GET['id'];

// Retrieve data from database
$sql = "SELECT * FROM result WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $level_term = $row['level_term'];
        $name = $row['name'];
        $roll = $row['roll'];
        $a_i = $row['a_i'];
        $m_a = $row['m_a'];
        $network = $row['network'];
        $e_s = $row['e_s'];
        $o_s = $row['o_s'];
        $a_i_s = $row['a_i_s'];
        $network_s = $row['network_s'];
        $e_s_s = $row['e_s_s'];
        $o_s_s = $row['o_s_s'];
        $attendance = $row['attendance'];
        $total = $row['total'];
        $grade = $row['grade'];
    }
} else {
    echo "0 results";
}

?>












<!-- Display the form for editing the record -->
<form method="post" action="edit.php">
   
<form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Level Term: <input type="text" name="level_term" value="<?php echo $level_term; ?>"><br>
    Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
    
    Roll: <input type="text" name="roll" value="<?php echo $roll; ?>"><br>
    
    Artificial Intelligence: <input type="text" name="a_i" value="<?php echo $a_i; ?>"><br>
  
    Mathematical Analysis: <input type="text" name="m_a" value="<?php echo $m_a; ?>"><br>
    
    Computer Network<input type="text" name="network" value="<?php echo $network; ?>"><br>
    
    Environment System: <input type="text" name="e_s" value="<?php echo $e_s; ?>"><br>
    
    Operating System: <input type="text" name="o_s" value="<?php echo $o_s; ?>"><br>
    
    Artificial Intelligence(sessional): <input type="text" name="a_i_s" value="<?php echo $a_i_s; ?>"><br>
    
    Network (Sessional): <input type="text" name="network_s" value="<?php echo $network_s; ?>"><br>

    Environment System (Sessional): <input type="text" name="e_s_s" value="<?php echo $e_s_s; ?>"><br>
    
    operating System (Sessional): <input type="text" name="o_s_s" value="<?php echo $o_s_s; ?>"><br>
    
    Attendance: <input type="text" name="attendance" value="<?php echo $attendance; ?>"><br>
    
    Total: <input type="text" name="total" value="<?php echo $total; ?>"><br>
    
    Grade: <input type="text" name="grade" value="<?php echo $grade; ?>"><br>
    
    
    <input type="submit" value="Save"> 
    
</form>





</body>
</html>