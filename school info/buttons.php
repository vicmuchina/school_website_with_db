<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
     <title>school upload site</title>
     <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet"> 
</head>
<body style=" overflow-x: hidden;overflow-y: hidden;"> 
<div class="container-fluid">
<div class="image" ><img src="images/pexels-photo-1595385.jpeg" class="img.fluid"></div> 
  <div class="row c">
   <h2 style="position: absolute;top:4%;z-index: 120;
    text-align:center;font-family: 'Roboto', sans-serif;font-size: 3rem;">Welcome
    <?php
     echo " ".$_SESSION['activeUser'];
    ?>
  </h2>
  </div>
 <div class="row a" id="a">
  <div class="col-md-4">
  <a href="Page-9.html" id="button" class="btn btn-success btn-lg" role="button" >back to landing page</a>
   </div> 
  <div class="col-md-4">   
  <a href="../stafflist.php" class="btn btn-info btn-lg" role="button">All staffs</a>
   </div>
  <div class="col-md-4">       
  <a href="../studentlist.php" class="btn btn-warning btn-lg "role="button" id="x" >All students</a>
  </div>


  </div>       

</div>

</body>