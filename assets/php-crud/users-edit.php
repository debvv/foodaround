<?php

include_once "../php/config.php";
$incoming_msg_id = "";
$outgoing_msg_id = "";
$msg = "";

$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == 'GET'){
    //get method: show the data of the message
    if( !isset($_GET["msg_id"])) {
        header("location: messages-index.php");
        exit;
    }
    $msg_id = $_GET["msg_id"];
    
    //read the row of the selected message from database table
    $sql = "SELECT * FROM messages WHERE msg_id = $msg_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$row){
        header("messages-index.php");
        exit;
    }

    $incoming_msg_id = $row["incoming_msg_id"];
    $outgoing_msg_id = $row["outgoing_msg_id"];
    $msg = $row["msg"];

}
else{
    // post method: update the data of the client
    $msg_id = $_POST["msg_id"];
    $incoming_msg_id = $_POST["incoming_msg_id"];
    $outgoing_msg_id = $_POST["outgoing_msg_id"];
    $msg = $_POST["msg"]; 

    do {
        if ( empty($incoming_msg_id)  || empty($outgoing_msg_id)  || empty($msg)    ) {
			$errorMessage = "All the fields are required";
			break;
        }
        $sql = "UPDATE messages SET incoming_msg_id = '$incoming_msg_id', 
        outgoing_msg_id='$outgoing_msg_id', msg='$msg' WHERE msg_id = $msg_id";
                // UPDATE `messages` SET `incoming_msg_id`='993879515',`outgoing_msg_id`='1233085864',`msg`='Приветствую тебя!' WHERE `msg_id`=1
        $result = $conn->query($sql);
        
        if( !$result ){
            $errorMessage = "Invalid query: ". $conn->error;
            break;
        }

        $successMessage = "Message updated correctly";

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
            <input type="hidden" name="msg_id" value="<?php echo $msg_id; ?>">
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