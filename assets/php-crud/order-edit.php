<?php

include_once "../php/config.php";

$time_data = "";
$name = "";
$from_id = "";
$product = "";
$description = "";
$count = "";
$email = "";
$address = "";
$accepted = "";

						

$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == 'GET'){
    //get method: show the data of the message
    if( !isset($_GET["id_order"])) {
        header("location: order-index.php");
        exit;
    }
    $id_order = $_GET["id_order"];
    
    //read the row of the selected message from database table
    $sql = "SELECT * FROM orders WHERE id_order = $id_order";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$row){
        header("users-index.php");
        exit;
    }

    $time_data = $row["time_date"];
    $name = $row["name"];
    $from_id = $row["from_id"];
    $product = $row["product"];
    $description = $row["description"];
    $count = $row["count"];
    $email = $row["email"];
    $address = $row["address"];
    $accepted = $row["accepted"];

}
else{
    // post method: update the data of the client
    $time_data = $_POST["time_date"];
    $name = $_POST["name"];
    $from_id = $_POST["from_id"];
    $product = $_POST["product"];
    $description = $_POST["description"];
    $count = $_POST["count"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $accepted = $_POST["accepted"];
	$id_order = $_POST['id_order']; //fix error with sintax $sql down
    do {
        if ( empty($time_data)  || empty($name)  || empty($from_id)  || empty($product)  || empty($description)  || empty($count)  || empty($email)  || empty($address)   || empty($accepted)    ) {
			$errorMessage = "All the fields are required";
			break;
        }
        $sql = "UPDATE orders SET time_date = '$time_data', 
        name='$name', from_id='$from_id', 
		product='$product', description='$description', 
		count='$count', email='$email', 
		address='$address', 
		accepted='$accepted' WHERE id_order = $id_order";
               
        $result = $conn->query($sql);
        
        if( !$result ){
            $errorMessage = "Invalid query: ". $conn->error;
            break;
        }

        $successMessage = "Message updated correctly";

        header("location: order-index.php");
        exit;

    } while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Messages</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container my-5">
		<h2>New Message</h2>

		<?php
		if (!empty($errorMessage)) {
			echo "
			<div class='alert alert-warning alert-dismissible fade show' role='alert'> 
			<strong>$errorMessage</strong>  
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			</div>
			";
		}
		?>
		<form method="post">
            <input type="hidden" name="id_order" value="<?php echo $id_order; ?>">
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Time Date</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="time_date" value="<?php echo $time_data; ?>">
				</div>			
			</div>

			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
				</div>			
			</div>

			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">From ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="from_id" value="<?php echo $from_id; ?>">
				</div>			
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Product</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="product" value="<?php echo $product; ?>">
				</div>			
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Description</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
				</div>			
			</div>
            <div class="row mb-3">
				<label class="col-sm-3 col-form-label">Count</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="count" value="<?php echo $count; ?>">
				</div>			
			</div>
            <div class="row mb-3">
				<label class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
				</div>			
			</div>
            <div class="row mb-3">
				<label class="col-sm-3 col-form-label">Address</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
				</div>			
			</div>
            <div class="row mb-3">
				<label class="col-sm-3 col-form-label">Accepted</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="accepted" value="<?php echo $accepted; ?>">
				</div>			
			</div>
			<?php
			if (!empty($successMessage)) {
				echo "
				<div class='row mb-3'>
					<div class='offset-sm-3 col-sm-6'>
						<div class='alert alert-warning alert-dismissible fade show' role='alert'> 
						<strong>$successMessage</strong>  
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>
					</div>
				</div>	
				";
			}
			?>
			<div class="row mb-3">
				<div class="offset-sm-3 col-sm-3 d-grid">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<div class="col-sm-3 d-grid">
					<a class="btn btn-outline-primary" href="order-index.php" role="button">Cancel</a>
				</div>
			</div>
		</form>
	</div>	
</body>
</html>