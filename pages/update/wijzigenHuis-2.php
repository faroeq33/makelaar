  <?php
  include "../../config.php";
  include $rootFolder . "helpers/helpers.php";

  $form = [
    'aantalVerdiepingen' => $_POST['aantalVerdiepingen'],
    'aantalKamers' => $_POST['aantalKamers'],
    'breedte' => $_POST['breedte'],
    'hoogte' => $_POST['hoogte'],
    'diepte' => $_POST['diepte'],
    'prijs_m2' => $_POST['prijs_m2'],
    'isKoopwoning' => $_POST['isKoopwoning'],
    'Woonwijk_idWoonwijk' => $_POST['Woonwijk_idWoonwijk'],
    'WoningSoort_idWoningSoort' => $_POST['WoningSoort_idWoningSoort'],
    'WoningStatus_idWoningStatus' => $_POST['WoningStatus_idWoningStatus'],
  ];

  $huis = prepared_update(
    $conn,
    "UPDATE Huis SET 
aantalVerdiepingen=:aantalVerdiepingen,
aantalKamers=:aantalKamers,
breedte=:breedte,
hoogte=:hoogte,
diepte=:diepte,
prijs_m2=:prijs_m2,
isKoopwoning=:isKoopwoning,
WoningSoort_idWoningSoort=:WoningSoort_idWoningSoort,
WoningStatus_idWoningStatus=:WoningStatus_idWoningStatus
  WHERE Woonwijk_idWoonwijk=:Woonwijk_idWoonwijk
  ",
    $form
  );
  ?>
