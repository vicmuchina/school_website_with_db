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

$firstnameErr=$lastnameErr=$emailErr=$employeeidErr=$genderErr=$salaryErr =$phonenumberErr="";
$firstname=$lastname=$email=$employeeid=$gender =$salary=$phonenumber="";
$id="";
$phn="";
$em="";
$stmt="";
if (isset($_POST["submit"])) {
	# code...
	if (empty($_POST["firstname"])) {
		# code...
		$firstnameErr="staff's firstname required";
	}else{
		$firstname=$_POST["firstname"];
		$firstname=filter_var($firstname, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed";
    }
	}


	if (empty($_POST["lastname"])) {
		# code...
		$lastnameErr="staff's lastname required";
	}else{
		$lastname=$_POST["lastname"];
		$lastname=filter_var($lastname, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
    }
	}


	if (empty($_POST["email"])){
		# code...
		$emailErr="staff's email is required";
	}else{
		$email=$_POST["email"];
		$email=filter_var($email, FILTER_SANITIZE_EMAIL);
		// check if e-mail address is well-formed
    // Validate e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
 			$em="valid email" ;
		} else {
  			 $emailErr ="Invalid email format";
				}
	}

	if (empty($_POST["employeeid"])) {
		# code...
		$employeeidErr="staff's employee ID is required";
	}else{
		$employeeid=$_POST["employeeid"];
		$employeeid=filter_var($employeeid, FILTER_SANITIZE_NUMBER_INT);
		// validate integers
		if (filter_var($employeeid, FILTER_VALIDATE_INT) === 0 || !filter_var($employeeid, FILTER_VALIDATE_INT) === false) {
  		$id="ID is valid";
			} else {
  			$employeeidErr="ID is invalid";
			}
	}


	if (empty($_POST["gender"])) {
		# code...
		$genderErr="staff's gender is required";
	}else{
		$gender=$_POST["gender"];
	}


	if (empty($_POST["salary"])) {
		# code...
		$salaryErr="staff's salary is required";
	}else{
		$salary=$_POST["salary"];
		$salary=filter_var($salary, FILTER_SANITIZE_NUMBER_INT);
		// validate integer
		if (filter_var($salary, FILTER_VALIDATE_INT) === 0 || !filter_var($salary, FILTER_VALIDATE_INT) === false) {
  		$phn="salary is valid";
			} else {
  			$salaryErr="salary is invalid";
			}
	}


	if (empty($_POST["phonenumber"])) {
		# code...
		$phonenumberErr="phonenumber is required";
	}else{
		$phonenumber=$_POST["phonenumber"];
		$phonenumber=filter_var($phonenumber, FILTER_SANITIZE_NUMBER_INT);
		// validate integer
		if (filter_var($phonenumber, FILTER_VALIDATE_INT) === 0 || !filter_var($phonenumber, FILTER_VALIDATE_INT) === false) {
  		$phn="phonenumber is valid";
			} else {
  			$phonenumberErr="phonenumber is invalid";
			}
	}


      if (empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($employeeidErr) && empty($genderErr) && empty($salaryErr) && empty($phonenumberErr) ) {
      	# code...
  //     	$sql = "INSERT INTO staff ( firstname, lastname, email, employeeid, gender , salary, phone_number)
		// VALUES ('$firstname', '$lastname', '$email', '$employeeid', '$gender', '$salary', '$phonenumber')";
		$stmt = $conn->prepare("INSERT INTO staff (firstname, lastname, email, employeeid, gender, salary, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisii", $firstname, $lastname, $email,$employeeid,$gender,$salary,$phone_number);
		// set parameters and execute

		 $firstname=$firstname;
		 $lastname=$lastname;
		 $email=$email;
		 $employeeid=$employeeid;
		 $gender=$gender;
		 $salary=$salary;
		 $phone_number=$phonenumber;

		 $stmt->execute();
		 echo "new staff record successfully created";
		 $stmt->close();

	 //  if ($conn->query($sql) === TRUE) {
		//  	 echo "New staff record created successfully";
		// } else {
  // 		echo "Error: " . $sql . "<br>" . $conn->error;
		// }

      }else{echo "Please input valid details";}




}










?>