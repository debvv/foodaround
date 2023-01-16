<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container my-5">
		<h2>List of Users</h2>
		<br>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Password</th>
					<th>Status</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include_once "../php/config.php";

				$sql = "SELECT * FROM users"; //читает все строки из таблицы БД
				$result = $conn->query($sql);
				
				//читает данные из каждой строки
				while($row = $result->fetch_assoc()){
					echo "
					<tr>
						<td>$row[unique_id]</td>
						<td>$row[fname]</td>
						<td>$row[lname]</td>
						<td>$row[email]</td>
						<td>$row[password]</td>
						<td>$row[status]</td>
						<td>$row[role]</td>
						<td>
							<a class='btn btn-primary btn-sm' href='../php-crud/users-edit.php?unique_id=$row[unique_id]'> Edit </a>
							<a class='btn btn-danger btn-sm' href='../php-crud/users-delete.php?unique_id=$row[unique_id]''> Delete </a>
						</td>
					</tr>
					";
				}
				?>
				
			</tbody>
		</table>
	</div>
</body>
</html>