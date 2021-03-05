<?php include "connection.php"?>
<?php
$sql="SELECT id, firstname, lastname, email, gender, admission_number, passport FROM students";
$result = $conn->query($sql);

?>	
<!DOCTYPE html>
<html>
<head>
	<title>stafflist</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<p style="font-size: 3rem;font-weight: bold;text-align: center;">list of students and details</p>
<div class="container">
		<table class="table table-dark table-hover">
    <thead>
      <tr>
      	<th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Gender</th>
        <th>admissionnumber</th>
          <th>photo</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    while($row =$result->fetch_assoc()):
    ?>
      <tr>
      	<th><?php echo $row['id']; ?></th>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname'] ;?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['admission_number']; ?></td>
         <td>
        <?php echo "<img src='studentspassportphotos/" . $row['passport'] . "'style='width:100px; height:100px;'>" 
        ?>
        </td>
         <td>
        <a href="studentupdateform.php?edit=<?php echo $row['id'];  ?>" type="button" value="edit" name="edit" class="btn btn-warning">Edit</a>
        <a href="studentlist.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" type="button" name="delete">Delete</a>
        </td>

      </tr>
     <?php
 		endwhile;
     ?> 


        <?php 
        if (isset($_GET['delete'])) {
          # code...
          $id=$_GET['delete'];
          $sql="DELETE FROM students WHERE id=$id";
          $conn->query($sql) or die($conn->error);

          echo "deleted";
          header('Location: studentlist.php');

        } 

         ?>

    </tbody>
  </table>
</div>


</div>

</body>
</html>