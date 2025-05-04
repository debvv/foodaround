
<?php
      
      $errors = array();

      // Check if date has been entered
      if (!isset($_POST['date'])) {
            $errors['date'] = 'Please enter date of reservation';
      }

      // Check if time has been entered
      if (!isset($_POST['time'])) {
            $errors['time'] = 'Please select time of reservation';
      }
      
      //Check if people has been entered
      if (!isset($_POST['people'])) {
            $errors['people'] = 'Please enter the number of people for reservation';
      }

      // Check if email has been entered and is valid
      if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
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



      $date = $_POST['date'];
      $time = $_POST['time'];
      $people = $_POST['people'];
      $email = $_POST['email'];
      $from = $email;
      $name = $_POST['name'];
      $product = $_POST['product'];
      $description = $_POST['description'];
      $address = $_POST['address'];

      $to = 'jenea983@mail.ru';;  // please change this email id
      $subject = 'Reservation Form: FoodAround';
      
      $body = "From: E-Mail: $email\n 
      Date: $date\n 
      Time: $time\n
      Person Name: $name\n
      Product: $product\n
      Product Description: $description\n
      Number of portions/count: $people\n
      Address: $address\n";


      $headers = "From: ".$from;

      //send the email
      $result = '';
      if (mail ($to, $subject, $body, $headers)) {
            $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
            $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $result .= 'Thank You! We will reserve a table <i class="fa fa-smile"> in that date';
            $result .= '</div>';


            session_start();
		include_once "config.php";

            $insert_query_order = mysqli_query($conn, "INSERT INTO `orders`(`time_date`, `name`, `from_id`, 
            `product`, `description`, `count`, `email`, `address`, `accepted`) 
            VALUES ('{$date},{$time}','$name','{$_SESSION['unique_id']}','$product','$description','$people',
            '$email','$address', 0)");


            echo $result;
            die();
      }

      $result = '';
      $result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
      $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      $result .= 'Something bad happend during sending this message. Please try again later';
      $result .= '</div>';

      echo $result;
