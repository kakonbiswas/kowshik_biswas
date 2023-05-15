<?php 

include 'connection.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$deletequery ="DELETE from result where Id= $id";

$query =mysqli_query($conn,$deletequery);

if($query){
    echo "delete done.";
}else{
    echo "delete not done.";
}

header ('location:admin-result.php ');
?>