<?php
include_once "../php/config.php";

$unique_id = "";
$fname = "";
$lname = "";
$email = "";
$password = "";
$img = "";
$status = "";
$role = "";

$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
	$unique_id = $_POST["incoming_msg_id"];
	$outgoing_msg_id = $_POST["outgoing_msg_id"];
	$msg = $_POST["msg"];

	do {
		if ( empty($incoming_msg_id)  || empty($outgoing_msg_id)  || empty($msg)    ) {
			$errorMessage = "All the fields are required";
			break;
		}

		// добавить новую запись в Бд/табл
		$sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)" .
			   "VALUES ('$incoming_msg_id', '$outgoing_msg_id', '$msg')";
		$result = $conn->query($sql);
		if( !$result ){
			$errorMessage = 'Invalid query: '. $conn->error;
			break;
		}
	
		$incoming_msg_id = "";
		$outgoing_msg_id = "";
		$msg = "";

		$successMessage = "Message added correctly";

		header("location: messages-index.php");
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
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">incoming_msg_id</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="incoming_msg_id" value="<?php echo $incoming_msg_id; ?>">
				</div>			
			</div>

			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">outgoing_msg_id</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="outgoing_msg_id" value="<?php echo $outgoing_msg_id; ?>">
				</div>			
			</div>

			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">msg</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="msg" value="<?php echo $msg; ?>">
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
					<a class="btn btn-outline-primary" href="messages-index.php" role="button">Cancel</a>
				</div>
			</div>
		</form>
	</div>	
</body>
</html>