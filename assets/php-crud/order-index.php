<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Orders</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container my-5">
		<h2>CRUD - Таблица Orders [ Заказы потребителей ]</h2>
		<br>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Data Time</th>
					<th>Name</th>
					<th>From ID</th>
					<th>Product</th>
					<th>Description</th>
					<th>Count</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Accepted</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include_once "../php/config.php";

				$sql = "SELECT * FROM orders"; //читает все строки из таблицы БД
				$result = $conn->query($sql);
				
				//читает данные из каждой строки
				while($row = $result->fetch_assoc()){
					echo "
					<tr>
						<td>$row[id_order]</td>
						<td>$row[time_date]</td>
						<td>$row[name]</td>
						<td>$row[from_id]</td>
						<td>$row[product]</td>
						<td>$row[description]</td>
						<td>$row[count]</td>
                        <td>$row[email]</td>
                        <td>$row[address]</td>
                        <td>$row[accepted]</td>
						<td>
							<a class='btn btn-primary btn-sm' href='../php-crud/order-edit.php?id_order=$row[id_order]'> Edit </a>
							<a class='btn btn-danger btn-sm' href='../php-crud/order-delete.php?id_order=$row[id_order]''> Delete </a>
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