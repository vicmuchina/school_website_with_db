<?php include "connection.php"?>
<?php
$sql="SELECT id, firstname, lastname, email, employeeid, gender, salary, phone_number FROM staff";
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
<p style="font-size: 3rem;font-weight: bold;text-align: center;">list of staff and details</p>
<div class="container">
		<table class="table table-dark table-hover">
    <thead>
      <tr>
      	<th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Employee id</th>
        <th>Gender</th>
        <th>Salary</th>
        <th>Phonenumber</th>
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
        <td><?php echo $row['employeeid']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['salary']; ?></td>
        <td><?php echo $row['phone_number']; ?></td>
      </tr>
     <?php
 		endwhile;
     ?> 
    </tbody>
  </table>
</div>


</div>

</body>
</html>