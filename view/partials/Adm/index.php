<?php require_once './config/Database.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>

	<style type="text/css">
		.manageMember {
			width: 50%;
			margin: auto;
		}

		table {
			width: 100%;
			margin-top: 20px;
		}

	</style>

</head>
<body>

<div class="manageMember">
	<a href="create.php"><button type="button">Add Member</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>id</th>
				<th>Nome</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php
      $sql = 'SELECT * FROM usuarios ';
      $result = mysqli_query($conexao,$sql);
				while($row = $result->fetch_assoc()) {
					echo "<tr>
						<td>".$row['id_usuario']."</td>
						<td>".$row['nome']."</td>
						<td>".$row['email']."</td>
						<td>
							<a href='edit.php?id=".$row['id']."'><button type='button'>Edit</button></a>
							<a href='remove.php?id=".$row['id']."'><button type='button'>Remove</button></a>
						</td>
					</tr>";
				}
			?>
		</tbody>
	</table>
</div>

</body>
</html>