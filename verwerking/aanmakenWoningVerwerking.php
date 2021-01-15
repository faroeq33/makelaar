<?php
include_once "../includes/preparedInsert.php";
echo "<pre>";
var_dump($_POST['form']);
echo "</pre>";

include "../dbConfig.php";

if (isset($_POST['form'])) {
  $sql = "INSERT INTO 
   Huis, 
   Woonwijk, 
   WoningSoort, 
   WoningStatus (
    aantalVerdiepingen,
    aantalKamers,
    breedte,
    hoogte,
    diepte,
    prijs_m2,
    isKoopwoning,
    (INSERT INTO woni)WoningStatus_idWoningStatus,
    Woonwijk_idWoonwijk,
    WoningSoort_idWoningSoort
  ) VALUES (
    :aantalVerdiepingen,
    :aantalKamers,
    :breedte?,
    :hoogte,
    :diepte,
    :prijs_m2,
    :isKoopwoning,
    :WoningStatus_idWoningStatus,
    :Woonwijk_idWoonwijk,
    :WoningSoort_idWoningSoort)";

  echo 'Het is gelukt';
} else {
  echo 'formulier is nog niet volledig ingevoerd <br><a href="../aanmakenWijk.php">Terug</a>';
}
