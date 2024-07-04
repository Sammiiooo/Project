<?php

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$pettype = $_POST['pettype'];
	$number = $_POST['number'];
	$feedback = $_POST['feedback'];

	//database connection
	$conn = new mysqli('localhost' , 'root', '', 'pets');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into feedback(firstname, lastname, email, pettype, number, feedback)
		values(?,?,?,?,?,?)");
		$stmt-> bind_param("ssssis" ,$firstname, $lastname, $email, $pettype, $number, $feedback);
		$stmt-> execute();
		echo "feedback successfull...";
		$stmt->close();
		$conn->close();
	}
?>

