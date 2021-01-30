<?php
include "../../config.php";
include $rootFolder . "helpers/helpers.php";

$form = [
  'idHuisParam' => $_GET['idHuis']
];

$geselecteerdHuis = prepared_select($conn, "SELECT 
idHuis,
aantalVerdiepingen,
aantalKamers,
breedte,
hoogte,
diepte,
prijs_m2,
isKoopwoning,
woonwijkNaam,
woningSoortNaam,
woningStatusNaam FROM Huis, Woonwijk, WoningSoort, WoningStatus 
WHERE Huis.WoningStatus_idWoningStatus = WoningStatus.idWoningStatus
AND Huis.Woonwijk_idWoonwijk = Woonwijk.idWoonwijk
AND Huis.WoningSoort_idWoningSoort = WoningSoort.idWoningSoort
AND Huis.idHuis=:idHuisParam", $form);
?>

<div class="container">
  <table class="table table-striped">
    <?
      foreach ($geselecteerdHuis[0] as $key => $value) {
        echo '<tr>
          <td>' . $key .  '</td>
          <td>' . $value .  '</td>
        </tr>';
      }
    ?>

    <form action="/makelaar-php/pages/delete/verwijderHuisBevestiging.php" method="POST">
      <input type="hidden" value="<? echo $_GET['idHuis']?>" name="idHuis">
      <input type="submit" class="btn btn-danger" value="Definitief Verwijderen">
    </form>
</div>