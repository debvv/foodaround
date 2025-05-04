<?php

	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Пожалуйста введите своё имя';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Пожалуйста введите действующую электронную почту';
	}

	//Check if message has been entered
	if (!isset($_POST['message'])) {
		$errors['message'] = 'Пожалуйста введите ваше сообщение';
	}

	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}



	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$from = $email;
	$to = 'jenea983@mail.ru';  // please change this email id
	$subject = 'Contact Form : FoodAround - The best site';

	$body = "From: $name\n E-Mail: $email\n Message:\n $message";

	$headers = "From: ".$from;


	//send the email
	$result = '';
	if (mail ($to, $subject, $body, $headers)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Спасибо! Мы будем на связи.';
		$result .= '</div>';
//      	
if (!headers_sent() && session_id() === '') {
	session_start();
}
		include_once "config.php";
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$msg = mysqli_real_escape_string($conn, $_POST['message']);
		
		$insert_query_db = mysqli_query($conn, "INSERT INTO feedback (`from_id`, `name`, `email`, `msg`)
          VALUES ('{$_SESSION['unique_id']}', '{$name}','{$email}', '{$message}')");
		
// 

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Что-то плохое произошло во время отправки этого сообщения. Пожалуйста, попробуйте еще раз позже.';
	$result .= '</div>';

	echo $result;

	?>