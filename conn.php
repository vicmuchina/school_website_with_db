<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mysqliphp";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else(echo "Connection successful<br>";)
// create a data base
$sql='CREATE DATABASE mysqliphp';
// check if database has been created
if ($conn->query($sql)===TRUE){
	echo "database has been created";}
else{echo "failed to create database" . $conn->error."<br>";}

// create two tables students and staff
$sql="CREATE TABLE students(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
admission_no INT(200),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if($conn->query($sql)===TRUE){

	echo "Students table created<br>";
}
else{echo "StaffTable not created".$conn->error."<br>";
}

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

// 	echo "Staff table created<br>";
// }
// else{echo "Staff table not created".$conn->error."<br>";
// }

// prepare and bind
$stmts= $conn->prepare("INSERT INTO students (firstname, lastname, email, admission_no) VALUES (?, ?, ?,?)");
$stmts->bind_param("sssi", $firstname, $lastname,$email,$admission_no);

// set parameters and execute
$firstname = "Brian";
$lastname = "Kamau";
$email = "liquidkama@gmail.com";
$admission_no=11;
$stmts->execute();

$firstname = "Mary";
$lastname = "Wanjiku";
$email = "maryling@gmail.com";
$stmts->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$admission_no=13;
$stmts->execute();

echo "New records created successfully<br>";

$stmts->close();

$stmt = $conn->prepare("INSERT INTO staff (firstname, lastname, email, gender, phone_number) VALUES (?, ?, ?, ? ,?)");
$stmt->bind_param("ssssi", $firstname, $lastname, $email, $gender, $phone_number);

// set parameters and execute
$firstname = "Joyce";
$lastname = "Nduta";
$email = "joyce@gmail.com";
$gender="female";
$phone_number="0723585745";
$stmt->execute();

$firstname = "Anastacia";
$lastname = "Wanjiku";
$email = "Wanjiku@gmail.com";
$gender="female";
$phone_number= "0722474999";
$stmt->execute();

$firstname = "Peter";
$lastname = "Njoroge";
$email = "njoroge@example.com";
$gender="male";
$phone_number= "0722811721";
$stmt->execute();

echo "New records created successfully<br>";

$stmt->close();

$conn->close()





?>