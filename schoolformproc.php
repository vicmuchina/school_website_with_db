<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr= $emailErr=$genderErr =$phonenumberErr="";
$firstname=$lastname= $email = $gender=$integer=$phonenumber="";
$studentfirstnameErr=$studentlastnameErr=$studentemailErr=$studentgenderErr =$admissionnumberErr="";
$studentfirstname=$studentlastname=$studentemail=$studentgender =$admissionnumber="";

if (isset($_POST['submit'])){
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    $firstname=filter_var($firstname, FILTER_SANITIZE_STRING);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed";
    }
  }
  

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    $lastname=filter_var($lastname, FILTER_SANITIZE_STRING);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    $email=filter_var($email, FILTER_SANITIZE_EMAIL);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["phonenumber"])) {
  	# code...
  	$phonenumberErr="integer is required";
  }else{
  	$phonenumber=test_input($_POST["phonenumber"]);
  	// $integer=filter_var($integer, FILTER_SANITIZE_NUMBER_INT);
  	//filter integer
  		# code...
  	if (filter_var($phonenumber, FILTER_VALIDATE_INT) ===0 || !filter_var($phonenumber, FILTER_VALIDATE_INT) === false )
  	 {
  		$phonenumberErr="";
		}
		else
			{
				$phonenumberErr="phonenumber is not valid";
			}
	}




  if (empty($_POST["studentfirstname"])) {
    $studentfirstnameErr = "Name is required";
  } else {
    $studentfirstname = test_input($_POST["studentfirstname"]);
    $studentfirstname=filter_var($studentfirstname, FILTER_SANITIZE_STRING);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$studentfirstname)) {
      $studentfirstnameErr = "Only letters and white space allowed";
    }
  }
  

  if (empty($_POST["studentlastname"])) {
    $studentlastnameErr = "Name is required";
  } else {
    $studentlastname = test_input($_POST["studentlastname"]);
    $studentlastname=filter_var($studentlastname, FILTER_SANITIZE_STRING);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$studentlastname)) {
      $studentlastnameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["studentemail"])) {
    $studentemailErr = "Email is required";
  } else {
    $studentemail = test_input($_POST["studentemail"]);
    $studentemail=filter_var($studentemail, FILTER_SANITIZE_EMAIL);
    // check if e-mail address is well-formed
    if (!filter_var($studentemail, FILTER_VALIDATE_EMAIL)) {
      $studentemailErr = "Invalid email format";
    }
  }


  if (empty($_POST["studentgender"])) {
    $studentgenderErr = "Gender is required";
  } else {
    $studentgender = test_input($_POST["studentgender"]);
  }
  

  if (empty($_POST["admissionnumber"])) {
    # code...
    $admissionnumberErr="admissionnumber is required";
  }else{
    $admissionnumber=test_input($_POST["admissionnumber"]);
    $admissionnumber=filter_var($admissionnumber, FILTER_SANITIZE_NUMBER_INT);
    // filter integer
      # code...
    if (filter_var($admissionnumber, FILTER_VALIDATE_INT) ===0 || !filter_var($admissionnumber, FILTER_VALIDATE_INT) === false )
     {
      $admissionnumberErr="";
    }
    else
      {
        $admissionnumberErr="admissionnumber is not valid";
      }
  
    }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$servername="localhost";
$username="root";
$password="";
$dbname="school";

$conn=new mysqli($servername,$username,$password,$dbname);
// check connection
if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
} else{
  echo "Connection successful<br>";
}
// $sql="CREATE TABLE students(
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// gender VARCHAR(50),
// admission_no INT(200),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if($conn->query($sql)===TRUE){

//  echo "Students table created<br>";
// }
// else{echo "StaffTable not created".$conn->error."<br>";
// }

// $sql="CREATE TABLE staff(
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// gender VARCHAR(50),
// phone_number INT(200) NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if($conn->query($sql)===TRUE){

//  echo "Staff table created<br>";
// }
// else{echo "Staff table not created".$conn->error."<br>";
// }


if ($studentfirstnameErr="Only letters and white space allowed" ||$studentlastnameErr = "Only letters and white space allowed" ||$studentemailErr = "Invalid email format" ) {
  # code...
  echo "Student's inputs Invalid<br>";
}else{

$sql = "INSERT INTO students ( firstname, lastname, email, gender,admission_no)
VALUES ('$studentfirstname', '$studentlastname', '$studentemail','$studentgender','$admissionnumber')";

if ($conn->query($sql) === TRUE) {
  echo "New student record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}


if ($firstnameErr="Only letters and white space allowed" ||$lastnameErr = "Only letters and white space allowed" ||$emailErr = "Invalid email format" ) {
  # code...
  echo "Staff's inputs Invalid<br>";
}else{

$sql = "INSERT INTO staff ( firstname, lastname, email, gender, phone_number)
VALUES ('$firstname', '$lastname', '$email','$gender','$phonenumber')";

if ($conn->query($sql) === TRUE) {
  echo "New staff record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}



?>