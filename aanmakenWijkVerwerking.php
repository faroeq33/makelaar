<?php
include "../paths.php";
include "../dbConfig.php";
include $includes . "preparedSelect.php";
include $includes . "preparedInsert.php";

if (isset($_POST['form'])) {
  $form = $_POST['form'];
  prepared_insert($conn, "Woonwijk", $form);
  $lastWijk = $conn->lastInsertId();

  echo "<pre>";
  var_dump($lastWijk);
  echo "</pre>";
  die('end of script');
  echo 'woonwijk is ingevuld';
} else {
  echo 'formulier is nog niet volledig ingevoerd <br><a href="../aanmakenWijk.php">Terug</a>';
}
