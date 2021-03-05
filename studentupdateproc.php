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
$idn="";
$id=0;
$passport="";

if (isset($_GET['edit'])) {
	# code...
	$id= $_GET['edit'];
	// pull requested code

	$sql="SELECT * FROM students WHERE id=$id ";
	$result=$conn->query($sql) or die($conn->error);

	$row=$result->fetch_assoc(); 
	$studentfirstname=$row["firstname"];
	$studentlastname=$row["lastname"];
	$studentemail=$row["email"];
	$studentgender=$row["gender"];
	$admissionnumber=$row["admission_number"];
	$passport=$row["passport"];

}

if (isset($_POST['update']))  {
	# code...
	$id = $_POST['id'];

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

	//captures users input
	$passport = $_FILES['passport']['name'];
	 # code...
    // this variable is for the path of the image storage
    $target = "studentspassportphotos/" .basename($_FILES['passport']['name']);	
    $temp=$_FILES['passport']['tmp_name'];
    move_uploaded_file($temp,$target);




	if (empty($studentnameErr)&& empty($studentlastnameErr) && empty($studentemailErr) && empty($studentgenderErr) && empty($admissionnumberErr)) {
	# code...
		 $sql ="UPDATE students SET firstname='$studentfirstname', lastname='$studentlastname',
 		 email ='$studentemail', gender='$studentgender',
 		  admission_number='$admissionnumber',passport='$passport'  WHERE id='$id'";

  		$a=$conn->query($sql) or die($conn->error);
  		if ($a===TRUE) {
  			# code...
  			echo "update successful";
  			header('Location:studentlist.php');
	
  		}
	}
	
	else{echo "please input valid details";}



}


?>