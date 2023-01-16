<?php

include_once "../php/config.php";

$fname = "";
$lname = "";
$email = "";
$status = "";
$role = "";

						

$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == 'GET'){
    //get method: show the data of the message
    if( !isset($_GET["unique_id"])) {
        header("location: users-index.php");
        exit;
    }
    $unique_id = $_GET["unique_id"];
    
    //read the row of the selected message from database table
    $sql = "SELECT * FROM users WHERE unique_id = $unique_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$row){
        header("users-index.php");
        exit;
    }

    $fname = $row["fname"];
	$lname = $row["lname"];
	$email = $row["email"];
	$status = $row["status"];
	$role = $row["role"];

}
else{
    // post method: update the data of the client
    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$status = $_POST["status"];
	$role = $_POST["role"];

    do {
        if ( empty($fname)  || empty($lname)  || empty($email)  || empty($password)  || empty($status)  || empty($role)    ) {
			$errorMessage = "All the fields are required";
			break;
        }
        $sql = "UPDATE users SET fname = '$fname', 
        lname='$lname', email='$email', status='$status', role='$role' WHERE unique_id = $unique_id";
                // UPDATE `messages` SET `incoming_msg_id`='993879515',`outgoing_msg_id`='1233085864',`msg`='Приветствую тебя!' WHERE `msg_id`=1
        $result = $conn->query($sql);
        
        if( !$result ){
            $errorMessage = "Invalid query: ". $conn->error;
            break;
        }

        $successMessage = "Message updated correctly";

        header("location: users-index.php");
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
            <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">First Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
				</div>			
			</div>

			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Second Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
				</div>			
			</div>

			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
				</div>			
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Status</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="status" value="<?php echo $status; ?>">
				</div>			
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Role</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="role" value="<?php echo $role; ?>">
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
					<a class="btn btn-outline-primary" href="users-index.php" role="button">Cancel</a>
				</div>
			</div>
		</form>
	</div>	
</body>
</html>