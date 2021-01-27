<?php
include "../../config.php";
include $rootFolder . "helpers/helpers.php";

$form = [
  'Woonwijk_idWoonwijk' => $_POST['Woonwijk_idWoonwijk'],
  'aantalVerdiepingen' => $_POST['aantalVerdiepingen'],
  'aantalKamers' => $_POST['aantalKamers'],
  'breedte' => $_POST['breedte'],
  'hoogte' => $_POST['hoogte'],
  'diepte' => $_POST['diepte'],
  'prijs_m2' => $_POST['prijs_m2'],
  'isKoopwoning' => $_POST['isKoopwoning'],
  'WoningStatus_idWoningStatus' => $_POST['WoningStatus_idWoningStatus'],
  'WoningSoort_idWoningSoort' => $_POST['WoningSoort_idWoningSoort'],
];

prepared_insert($conn, "INSERT INTO Huis 
( 
  Woonwijk_idWoonwijk,
  aantalVerdiepingen,
  aantalKamers,
  breedte,
  hoogte,
  diepte,
  prijs_m2,
  isKoopwoning,
  WoningStatus_idWoningStatus,
  WoningSoort_idWoningSoort
  ) 
        VALUES (
  :Woonwijk_idWoonwijk,
  :aantalVerdiepingen,
  :aantalKamers,
  :breedte,
  :hoogte,
  :diepte,
  :prijs_m2,
  :isKoopwoning,
  :WoningStatus_idWoningStatus,
  :WoningSoort_idWoningSoort
)", $form);

$lastInsert = $conn->lastInsertId();

$ding = prepared_select($conn, "SELECT idHuis FROM Huis WHERE idHuis ={$lastInsert}");
?>

<body>
  <div class="container mt">

    <div class="alert alert-success">
      <b>
        <?php echo "Het huis met de huiscode : {$lastInsert}"; ?>
      </b> is ingevuld
    </div>
    <a href="woningoverzicht.php">Terug naar overzicht</a>
  </div>

  <?php

  ?>
</body>