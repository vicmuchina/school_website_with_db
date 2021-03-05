<?php include 'studentproc.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student entry form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container container-fluid">
	<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
	<caption><h2>STUDENTS' ENTRY FORM</h2></caption>
	<div class="row">
		<div class="col-6">
			<div class="form-group padding">
    			<label for="studentname"><strong>Student first name:</strong></label>
   				 <input type="text" name="studentfirstname" value="<?php echo $studentfirstname;?>" class="form-control border-gradient"  placeholder="Enter first name" id="studentname">
  				<span class="error"> <?php echo $studentnameErr;?></span> 
  				<br><br>
 			 </div>
      </div>
      <div class="col-6">
 			 <div class="form-group padding">
    			<label for="studentlastname"><strong>Student last name:</strong></label>
   				 <input type="text" name="studentlastname" value="<?php echo $studentlastname;?>" class="form-control border-gradient"  placeholder="Enter last name" id="studentlastname">
  				<span class="error"> <?php echo $studentlastnameErr;?></span>
  				<br><br>
 			 </div>
      </div>
    </div>
    <div class="row">
    <div class="col-6">
 			 <div class="form-group padding">
    			<label for="studentemail"><strong>Student email Address:</strong></label>
   				<input type="text" name="studentemail" value="<?php echo $studentemail;?>" class="form-control border-gradient"  placeholder="Enter email" id="studentemail">
  				<span class="error"> <?php echo $studentemailErr;?></span>
  				<br><br>
  			</div>
      </div>
      <div class="col-6">
  			<div class="custom-control custom-checkbox mb-3">
      			<input type="checkbox" class="custom-control-input" id="customCheck" name="studentgender" <?php if (isset($studentgender) && $studentgender=="male") echo "checked";?> value="male">
      			<label class="custom-control-label" for="customCheck">male</label>
   			 </div>
   			 <div class="custom-control custom-checkbox mb-3">
      			<input type="checkbox" class="custom-control-input" id="customCheck" name="studentgender" <?php if (isset($studentgender) && $studentgender=="female") echo "checked";?> value="female">
      			<label class="custom-control-label" for="customCheck">Female</label>
      			<span class="error"> <?php echo "<br>".$studentgenderErr;?></span>
   			 </div>
       </div>
       </div> 
    <div class="row">
        <div class="col-6">
     
 			 <div class="form-group padding">
    			<label for="admissionnumber"><strong>Admission number:</strong></label>
   				 <input type="text" name="admissionnumber" value="<?php echo $admissionnumber;?>" class="form-control border-gradient" placeholder="Enter admission number" id="admissionnumber" >
   				 <span class="error"> <?php echo $admissionnumberErr;?></span>
  				<br><br>
 			 </div>
 			
		</div>
    <div class="col-6">
      <label><strong>student's passport photo</strong></label>
      <input type="file" class="form-control" name="passport" id="passport"  placeholder="Student's passport photo" required="">
    </div>
   </div>
    <div class="row">
     <div class="col-6">
    <div><input type="submit" name="submit" value="submit" class="btn btn-lg btn-success border-gradient padding "></div>
   </div>
 </div>
    </div>
	</form>
  
</div>	
</body>
</html>