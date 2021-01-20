<?php
require "/opt/lampp/htdocs/makelaar-php/config.php";

$huizen = prepared_select($conn, "SELECT * FROM Huis, Woonwijk, WoningSoort, WoningStatus 
WHERE Huis.WoningStatus_idWoningStatus = WoningStatus.idWoningStatus
AND Huis.Woonwijk_idWoonwijk = Woonwijk.idWoonwijk
AND Huis.WoningSoort_idWoningSoort = WoningSoort.idWoningSoort");

?>

<body>
	<div class="container">
		<?php

		foreach ($huizen as $huis) {
			$idHuis = $huis['idHuis'];
			$aantalVerdiepingen = $huis['aantalVerdiepingen'];
			$aantalKamers = $huis['aantalKamers'];
			$woonwijkNaam = $huis['woonwijkNaam'];
			$breedte = $huis['breedte'];
			$hoogte = $huis['hoogte'];
			$diepte = $huis['diepte'];
			$prijs_m2 = $huis['prijs_m2'];
			$isKoopwoning = $huis['isKoopwoning'];
			$woningSoortNaam = $huis['woningSoortNaam'];
			$woningStatusNaam = $huis['woningStatusNaam'];


			echo '<table class="table table-striped" style="overflow:scroll;margin-bottom:2em;">';
			echo '<tr><td class="h2">Woonwijk</td><td class="h2">' . $woonwijkNaam . '</td></tr>';
			echo "<tr><td>ID Huis</td><td>{$idHuis}</td></tr>";
			echo "<tr><td>Aantal Verdiepingen</td><td>{$aantalVerdiepingen}</td></tr>";
			echo "<tr><td>aantalKamers</td><td>{$aantalKamers}</td></tr>";
			echo "<tr><td>breedte</td><td>{$breedte}</td></tr>";
			echo "<tr><td>hoogte</td><td>{$hoogte}</td></tr>";
			echo "<tr><td>diepte</td><td>{$diepte}</td></tr>";
			echo "<tr><td>Prijs per m<sup>2<sup></td><td>&euro;{$prijs_m2}</td></tr>";

			if ($isKoopwoning == 0) {
				echo '<tr><td colspan="2">Huur</td></tr>';
			} else {
				echo '<tr><td colspan="2">Koop</td></tr>';
			}

			echo "<tr><td>Soort</td><td>{$woningSoortNaam}</td></tr>";
			echo "<tr><td>Status</td><td>{$woningStatusNaam}</td></tr>";

			echo '<form action="../update/wijzigenHuis-1.php" method="GET">';
			echo '<input type="hidden" name="idHuis" value="' . $idHuis . '">';
			echo '<tr><td><input type="submit" value="Wijzigen" class="btn btn-info"></td><td>' . '</td></tr>';
			echo "</form>";
			echo '</table>';
		}

		?>

	</div>

</body>

</html>