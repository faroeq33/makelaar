<?php require "classes/Table.php";
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<title>Woningoverzicht</title>
</head>

<body>
	<?php include "dbConfig.php"; ?>
	<h3 class="">Woningoverzicht</h3>
	<table class="table table-striped">
		<tr>
			<th>idHuis</th>
			<th>aantalVerdiepingen</th>
			<th>aantalKamers</th>
			<th>breedte</th>
			<th>hoogte</th>
			<th>diepte prijs </th>
			<th>isKoopwoning</th>
			<th>Status_idStatus</th>
			<th>Woonwijk_idWoonwijk</th>
		</tr>
		<?php

		try {
			$stmt = $conn->prepare("SELECT * FROM Huis, Woonwijk, WoningSoort WHERE  ");
			$stmt->execute();

			// set the resulting array to associative
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

			foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $value) {
				echo $key;
				echo $value;
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$conn = null;
		?>
	</table>


	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>