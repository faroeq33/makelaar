<?php
include_once "../includes/preparedInsert.php";
echo "<pre>";
var_dump($_POST['form']);
echo "</pre>";

include "../dbConfig.php";

//haal de id op waarbij met de bijbehorende namen, zodat je de huizen kunt invoeren

if (isset($_POST['form'])) {
  // $sql = "INSERT INTO 
  // Huis, 
  // Woonwijk, 
  // WoningSoort, 
  // WoningStatus (
  //   aantalVerdiepingen,
  //   aantalKamers,
  //   breedte,
  //   hoogte,
  //   diepte,
  //   prijs_m2,
  //   isKoopwoning,
  //   WoningStatus_idWoningStatus,
  //   Woonwijk_idWoonwijk,
  //   WoningSoort_idWoningSoort
  // ) VALUES (
  //   :aantalVerdiepingen,
  //   :aantalKamers,
  //   :breedte?,
  //   :hoogte,
  //   :diepte,
  //   :prijs_m2,
  //   :isKoopwoning,
  //   :WoningStatus_idWoningStatus,
  //   :Woonwijk_idWoonwijk,
  //   :WoningSoort_idWoningSoort)";
  // $stmt = $conn->prepare($sql);
  // $stmt->bindParam()
  // $params = array_values($_POST['form']);
  // $stmt->execute($params);
  prepared_insert($conn, "Woonwijk", $_POST['form']);
  echo 'Het is gelukt';
} else {
  echo 'formulier is nog niet volledig ingevoerd <br><a href="../aanmakenWijk.php">Terug</a>';
}

//SQL Query nog testen voor het invoeren van een huis