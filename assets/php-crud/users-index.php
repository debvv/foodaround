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
		<a class="btn btn-primary" href="users-create.php" role="button">New Users</a>
		<br>
		<table>
			<thead>
				<tr>
					<th>⠀⠀⠀unique_id⠀⠀⠀</th>
					<th>fname⠀⠀⠀</th>
					<th>lname Msg⠀⠀⠀</th>
					<th>⠀⠀⠀⠀⠀⠀Message⠀⠀⠀</th>
					<th>⠀⠀⠀Action⠀⠀⠀</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include_once "../php/config.php";

				$sql = "SELECT * FROM messages"; //читает все строки из таблицы БД
				$result = $conn->query($sql);
				
				//читает данные из каждой строки
				while($row = $result->fetch_assoc()){
					echo "
					<tr>
						<td>$row[unique_id]</td>
						<td>$row[fname]</td>
						<td>$row[lname]</td>
						<td>$row[msg]</td>
						<td>
							<a class='btn btn-primary btn-sm' href='../php-crud/messages-edit.php?msg_id=$row[msg_id]'> Edit </a>
							<a class='btn btn-danger btn-sm' href='../php-crud/messages-delete.php?msg_id=$row[msg_id]''> Delete </a>
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