<?php include 'staffproc.php'?>
<!DOCTYPE html>
<html>
<head>
  <title>Staff entry form</title>
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'>
  <caption><h2>STAFFS' ENTRY FORM</h2></caption>
 <div class="row">
   <div class="col-6">
     <div class="form-group padding">
          <label for="firstname"><strong>Staff's first name:</strong></label>
           <input type="text" name="firstname" value="<?php echo $firstname;?>" class="form-control border-gradient"  placeholder="Enter first name">
          <span class="error"> <?php echo $firstnameErr;?></span> 
          <br><br>
       </div>
    </div>
    <div class="col-6">
      <div class="form-group padding">
          <label for="lastname"><strong>Staff's last name:</strong></label>
           <input type="text" name="lastname" value="<?php echo $lastname;?>" class="form-control border-gradient"  placeholder="Enter last name">
          <span class="error"> <?php echo $lastnameErr;?></span>
          <br><br>
       </div>
     </div>
   </div>
   <div class="row">
     <div class="col-6"> 
      <div class="form-group padding">
          <label for="staffemail"><strong>Staffs' email Address:</strong></label>
          <input type="text" name="email" value="<?php echo $email;?>" class="form-control border-gradient"  placeholder="Enter email" id="staffemail">
          <span class="error"> <?php echo $emailErr;?></span>
          <br><br>
      </div>
     </div>
     <div class="col-6">
      <div class="form-group padding">
          <label for="employeeid"><strong>Staffs' employee ID:</strong></label>
          <input type="text" name="employeeid" value="<?php echo $employeeid;?>" class="form-control border-gradient"  placeholder="Enter employee ID" value="<?php echo $employeeid;?>">
          <span class="error"> <?php echo $employeeidErr;?></span>
          <br><br>
      </div>
     </div>
     </div>

     <div class="row">
      <div class="col-6">  
      <div class="form-group padding">
          <label for="phonenumber"><strong>Phone number:</strong></label>
           <input type="text" name="phonenumber" value="<?php echo $phonenumber;?>" class="form-control border-gradient" placeholder="Enter phonenumber eg.,254722474999" id="phonenumber" >
           <span class="error"> <?php echo $phonenumberErr;?></span>
          <br><br>
      </div>
      </div>
      <div class="col-6">
         <div class="form-group padding">
          <label for="salary"><strong>Salary:</strong></label>
           <input type="text" name="salary" value="<?php echo $salary;?>" class="form-control border-gradient" placeholder="Enter amount of salary" id="salary" >
           <span class="error"> <?php echo $salaryErr;?></span>
          <br><br>
      </div>
      </div>
      </div>
    <div class="row">
      <div class="col-6"> 
      <div class="custom-control custom-checkbox mb-3">
        <input type="checkbox" class="custom-control-input" id="customCheck" name="gender"  <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male"  >
        <label class="custom-control-label" for="customCheck">male</label>
      </div>
      <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
            <label class="custom-control-label" for="customCheck">Female</label>
            <span class="error"> <?php echo "<br>". $genderErr;?></span>
      </div>
    </div>
    </div>
     <div style="margin-top: 15px;"><input type="submit" name="submit" value="submit" class="btn btn-lg btn-success border-gradient padding "></div> 

</form>
</div>
</body>
</html>