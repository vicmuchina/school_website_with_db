<?php

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



$studentnameErr=$studentlastnameErr=$studentemailErr=$studentgenderErr =$admissionnumberErr="";
$studentfirstname=$studentlastname=$studentemail=$studentgender =$admissionnumber="";
$adm="";
$em="";
$stmt="";
if (isset($_POST["submit"])) {
	# code...
	if (empty($_POST["studentfirstname"])) {
		# code...
		$studentnameErr="student's firstname required";
	}else{
		$studentfirstname=$_POST["studentfirstname"];
		$studentfirstname=filter_var($studentfirstname, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$studentfirstname)) {
      $studentnameErr = "Only letters and white space allowed";
    }
	}


	if (empty($_POST["studentlastname"])) {
		# code...
		$studentlastnameErr="student's lastname required";
	}else{
		$studentlastname=$_POST["studentlastname"];
		$studentlastname=filter_var($studentlastname, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$studentlastname)) {
      $studentlastnameErr = "Only letters and white space allowed";
    }
	}


	if (empty($_POST["studentemail"])){
		# code...
		$studentemailErr="student's email is required";
	}else{
		$studentemail=$_POST["studentemail"];
		$studentemail=filter_var($studentemail, FILTER_SANITIZE_EMAIL);
		// check if e-mail address is well-formed
    // Validate e-mail
		if (!filter_var($studentemail, FILTER_VALIDATE_EMAIL) === false) {
 			$em="valid email" ;
		} else {
  			 $studentemailErr ="Invalid email format";
				}
	}


	if (empty($_POST["studentgender"])) {
		# code...
		$studentgenderErr="student's gender is required";
	}else{
		$studentgender=$_POST["studentgender"];
	}


	if (empty($_POST["admissionnumber"])) {
		# code...
		$admissionnumberErr="student's admissionnumber is required";
	}else{
		$admissionnumber=$_POST["admissionnumber"];
		$admissionnumber=filter_var($admissionnumber, FILTER_SANITIZE_NUMBER_INT);
		// validate integer
		if (filter_var($admissionnumber, FILTER_VALIDATE_INT) === 0 || !filter_var($admissionnumber, FILTER_VALIDATE_INT) === false) {
  		$adm="admissionnumber is valid";
			} else {
  			$admissionnumberErr="admissionnumber is invalid";
			}
	}


if (empty($studentnameErr)&& empty($studentlastnameErr) && empty($studentemailErr) && empty($studentgenderErr) && empty($admissionnumberErr)) {
	# code...
	$stmt = $conn->prepare("INSERT INTO students (firstname, lastname, email, gender, admission_number) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssi", $firstname, $lastname, $email, $gender, $admission_number);

	// set parameters and execute

		 $firstname=$studentfirstname;
		 $lastname=$studentlastname;
		 $email=$studentemail;
		 $gender=$studentgender;
		 $admission_number=$admissionnumber;

		 $stmt->execute();
		 echo "new student record successfully created";
		 $stmt->close();

// $sql = "INSERT INTO students ( firstname, lastname, email, gender,admission_number)
// VALUES ('$studentfirstname', '$studentlastname', '$studentemail','$studentgender','$admissionnumber')";

// if ($conn->query($sql) === TRUE) {
//   echo "New student record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


}else{echo "please input valid details";}



}





?>