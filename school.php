<?php include'schoolformproc.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>School entry form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container container-fluid" style="margin-top: 20px">
	<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	<caption><h2>STAFF ENTRY FORM</h2></caption>
	<div class="row">
		<div class="col">
			<div class="form-group padding">
    			<label for="name"><strong>First name:</strong></label>
   				 <input type="text" name="firstname" value="<?php echo $firstname;?>" class="form-control border-gradient"  placeholder="Enter first name">
  				<span class="error"> <?php echo $firstnameErr;?></span>
  				<br><br>
 			 </div>
 			 <div class="form-group padding">
    			<label for="name"><strong>Last name:</strong></label>
   				 <input type="text" name="lastname" value="<?php echo $lastname;?>" class="form-control border-gradient"  placeholder="Enter last name">
  				<span class="error"> <?php echo $lastnameErr;?></span>
  				<br><br>
 			 </div>
 			 <div class="form-group padding">
    			<label for="email"><strong>Email Address:</strong></label>
   				<input type="text" name="email" value="<?php echo $email;?>" class="form-control border-gradient"  placeholder="Enter email">
  				<span class="error"> <?php echo $emailErr;?></span>
  				<br><br>
  			</div>
  			<div class="custom-control custom-checkbox mb-3">
      			<input type="checkbox" class="custom-control-input" id="customCheck" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="male">
      			<label class="custom-control-label" for="customCheck">male</label>
   			 </div>
   			 <div class="custom-control custom-checkbox mb-3">
      			<input type="checkbox" class="custom-control-input" id="customCheck" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="male"   >
      			<label class="custom-control-label" for="customCheck">Female</label>
   			 </div>
 			 <div class="form-group padding">
    			<label for="integer"><strong>Phone number:</strong></label>
   				 <input type="text" name="phonenumber" value="<?php echo $phonenumber;?>" class="form-control border-gradient" placeholder="Enter Phone number" id="integer" >
   				 <span class="error"> <?php echo $phonenumberErr;?></span>
  				<br><br>
 			 </div>
 			 <div><input type="submit" name="submit" value="submit" class="btn btn-lg btn-success border-gradient padding "></div>
		</div>
	</div>	

	</form>
</div>



</body>
</html>