<!doctype html>
<html lang="en">

<?php
include "dbConfig.php";
include "includes/Table.php";
include "includes/preparedSelect.php";
include "layout/header.php";
include "layout/nav.php";

$huizen = prepared_select($conn, "SELECT * FROM Huis, Woonwijk, WoningSoort, WoningStatus 
WHERE Huis.WoningStatus_idWoningStatus = WoningStatus.idWoningStatus
AND Huis.Woonwijk_idWoonwijk = Woonwijk.idWoonwijk
AND Huis.WoningSoort_idWoningSoort = WoningSoort.idWoningSoort");

?>

<body>
	<div class="container">
		<?php

		foreach ($huizen as $huis) {
			echo '<table class="table table-striped" style="overflow:scroll;margin-bottom:2em;">';
			echo '<tr><td class="h2">Woonwijk</td><td class="h2">' . $huis['woonwijkNaam'] . '</td></tr>';
			echo "<tr><td>ID Huis</td><td>" . $huis['idHuis'] . "</td></tr>";
			echo "<tr><td>Aantal Verdiepingen</td><td>" . $huis['aantalVerdiepingen'] . "</td></tr>";
			echo "<tr><td>aantalKamers</td><td>" . $huis['aantalKamers'] . "</td></tr>";
			echo "<tr><td>breedte</td><td>" . $huis['breedte'] . "</td></tr>";
			echo "<tr><td>hoogte</td><td>" . $huis['hoogte'] . "</td></tr>";
			echo "<tr><td>diepte</td><td>" . $huis['diepte'] . "</td></tr>";
			echo "<tr><td>Prijs per m<sup>2<sup></td><td>&euro;" . $huis['prijs_m2'] . "</td></tr>";

			if ($huis['isKoopwoning'] == 0) {
				echo '<tr><td colspan="2">Huur</td></tr>';
			} else {
				echo '<tr><td colspan="2">Koop</td></tr>';
			}

			echo "<tr><td>Soort</td><td>" . $huis['woningSoortNaam'] . "</td></tr>";
			echo "<tr><td>Status</td><td>" . $huis['woningStatusNaam'] . "</td></tr>";
			echo '</table>';
		}

		?>

	</div>

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>