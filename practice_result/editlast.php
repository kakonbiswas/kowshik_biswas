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
// Connect to the database
include('connection.php');
error_reporting(0);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get the values from the form
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
  
  // Update the data in the database
  $sql = "UPDATE result SET 
            level_term = '$level_term',
            name = '$name',
            roll = '$roll',
            a_i = '$a_i',
            m_a = '$m_a',
            network = '$network',
            e_s = '$e_s',
            o_s = '$o_s',
            a_i_s = '$a_i_s',
            network_s = '$network_s',
            e_s_s = '$e_s_s',
            o_s_s = '$o_s_s',
            attendance = '$attendance',
            total = '$total',
            grade = '$grade'
          WHERE id = $id";
          
  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>



    
  


    



<h2>Edit Result</h2>

<form action="edit2.php" method="post">
  <label for="id">ID:</label>
  <input type="text" id="id" name="id"  value="<?php echo $_GET['id']; ?>">

  <label for="level_term">Level Term:</label>
  <input type="text" id="level_term" name="level_term" value="<?php echo $_GET['ilevel_term']; ?>">

  <label for="name">Name:</label>
  <input type="text" id="name" name="name" value="<?php echo $_GET['name']; ?>">

  <label for="roll">Roll:</label>
  <input type="text" id="roll" name="roll" value="<?php echo $_GET['roll']; ?>">

  <label for="a_i">A_I:</label>
  <input type="text" id="a_i" name="a_i" required value="<?php echo $_GET['a_i']; ?>">

  <label for="m_a">M_A:</label>
  <input type="text" id="m_a" name="m_a" value="<?php echo $_GET['m_a']; ?>">

  <label for="network">Network:</label>
  <input type="text" id="network" name="network" value="<?php echo $_GET['network']; ?>">

  <label for="e_s">E_S:</label>
  <input type="text" id="e_s" name="e_s" value="<?php echo $_GET['e_s']; ?>">

  <label for="o_s">O_S:</label>
  <input type="text" id="o_s" name="o_s" value="<?php echo $_GET['o_s']; ?>">

  <label for="a_i_s">A_I_S:</label>
  <input type="text" id="a_i_s" name="a_i_s" value="<?php echo $_GET['a_i_s']; ?>">

  <label for="network_s">Network_S:</label>
  <input type="text" id="network_s" name="network_s" value="<?php echo $_GET['network_s']; ?>">

  <label for="e_s_s">E_S_S:</label>
  <input type="text" id="e_s_s" name="e_s_s" value="<?php echo $_GET['e_s_s']; ?>">

  <label for="o_s_s">O_S_S:</label>
  <input type="text" id="o_s_s" name="o_s_s" value="<?php echo $_GET['o_s_s']; ?>">

  <label for="attendance">Attendance:</label>
  <input type="text" id="attendance" name="attendance" value="<?php echo $_GET['attendance']; ?>">

  <label for="total">Total:</label>
  <input type="text" id="total" name="total" value="<?php echo $_GET['total']; ?>">

  <label for="grade">Grade:</label>
  <input type="text" id="grade" name="grade" value="<?php echo $_GET['grade']; ?>">

  <button type="submit">Update</button>
</form>









    
</body>
</html>