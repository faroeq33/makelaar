<?php
include "../../config.php";
include $rootFolder . "helpers/helpers.php";

$form = [
  'idHuisParam' => $_POST['idHuis']
];

prepared_delete($conn, "DELETE FROM Huis WHERE idHuis=:idHuisParam", $form);

header("location: /makelaar-php/pages/read/woningoverzicht.php");
