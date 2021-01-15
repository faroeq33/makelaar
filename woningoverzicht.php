<!doctype html>
<html lang="en">

<?php
include "dbConfig.php";
include "includes/Table.php";
include "includes/preparedSelect.php";
include "layout/header.php";
include "layout/nav.php";

$huizenRaw = prepared_select($conn, "SELECT aantalVerdiepingen,
aantalKamers,
breedte,
hoogte,
diepte,
prijs_m2,
isKoopwoning,
WoningStatus_idWoningStatus,
Woonwijk_idWoonwijk,
WoningSoort_idWoningSoort From Huis");

$woonwijkenRaw = prepared_select($conn, "SELECT woonwijkNaam FROM Huis, Woonwijk WHERE Huis.Woonwijk_idWoonwijk = Woonwijk.idWoonwijk");

$woonwijken = array_map(function ($naam) {
	return $naam['woonwijkNaam'];
}, $woonwijkenRaw,);

?>

<body>
	<div class="container">
		<table class="table table-striped" style="overflow:scroll;">
			<?php
			foreach ($huizenRaw as $huis) {
				foreach ($huis as $key => $value) {
					echo "<tr><th>" . $key  . "</th><td>" . $value  . "</td></tr>";
				}
			}
			?>
		</table>
	</div>

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>