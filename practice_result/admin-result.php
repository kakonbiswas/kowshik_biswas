<html>

<head>
<style>
    .table {
      width: 80%;
      margin: 80px auto 0;
      text-align: center;
      border-collapse: collapse;
    }
    .table th, .table td {
      padding: 10px;
      border: 1px solid #ddd;
    }
    .table th {
      background-color: #f2f2f2;
    }
    .add-record-btn {
  display: block;
  margin: 0 0 20px auto;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
}

    </style>
</head>

<body>
   

        <center>
      <h3 class="heading">Result</h3>
      <table class="table">
        <tr>
          <th>Id</th>
          <th>Level,Term</th>
          <th>Name</th>
          <th>Roll</th>
          <th>Artificial Intelligence</th>
          <th>Mathematical Analysis</th>
          <th>Computer Network</th>
          <th>Environmental System</th>
          <th>Operating System</th>
          <th>Artificial Intelligence(Sessional)</th>
          <th>Computer Network(Sessional)</th>
          <th>Environmental System(Sessional)</th>
          <th>Operating System(sessional)</th>
          <th>attendance</th>
          <th>Total</th>
          <th>Grade</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
       

                </tr>
                <tr>Add</tr>

                <?php
                include ('connection.php');
                ?>

                <?php

                $sql = "SELECT * FROM result";
                $result1 = $conn->query($sql);
                while ($row = mysqli_fetch_array($result1)) {
                    ?>
                <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['level_term'];?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['roll']; ?></td>
                        <td><?php echo $row['a_i']; ?></td>
                        <td><?php echo $row['m_a']; ?></td>
                        <td><?php echo $row['network']; ?></td>
                        <td><?php echo $row['e_s']; ?></td>
                        <td><?php echo $row['o_s']; ?></td>
                        <td><?php echo $row['a_i_s']; ?></td>
                        <td><?php echo $row['network_s']; ?></td>
                        <td><?php echo $row['e_s_s']; ?></td>
                        <td><?php echo $row['o_s_s']; ?></td>
                        <td><?php echo $row['attendance']; ?></td>
                       
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['grade']; ?></td>
                        
                        <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>


                    
                    
    
                    
                    <?php
                
                }

                ?>
                </tr>
            </table>
       
        
            <button>
  <a href="insert.php" class="button">
    <i class="button"></i> Add New Record
  </a>
</button>


</body>


           
</html>
                



                    
                
                