<?php
include "../dbConfig.php";

if (isset($_POST['form'])) {
  $sql = "INSERT INTO Woonwijk (woonwijkNaam) VALUES (?)";
  $stmt = $conn->prepare($sql);
  $params = array_values($_POST['form']);
  $stmt->execute($params);
  echo 'Het is gelukt';
} else {
  echo 'formulier is nog niet volledig ingevoerd <br><a href="../aanmakenWijk.php">Terug</a>';
}
