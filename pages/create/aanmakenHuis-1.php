<?php
include "../../config.php";
include $rootFolder . "helpers/helpers.php";



$wijken = prepared_select($conn, "SELECT * FROM `Woonwijk`
");
$soorten = prepared_select($conn, "SELECT * FROM WoningSoort");
$statussen = prepared_select($conn, "SELECT * FROM WoningStatus");


?>

<body>
  <div class="container">

    <h2 class="mt ml" style="margin-left:0.5em">Voeg een woonwijk toe</h2>

    <form action="aanmakenHuis-2.php" method="POST" class="ml form">
      <label for="woonwijkNaam" class="block">Woonwijk</label>


      <select class="form-control" name="Woonwijk_idWoonwijk" id="">
        <?
    foreach ($wijken as $wijk) {
      echo '<option value="' . $wijk['idWoonwijk'] . '"> ' . $wijk['woonwijkNaam'] .  ' </option>';
    }
    ?>
      </select>

      <input type="number" class="form-control" placeholder="AantalVerdiepingen" name="aantalVerdiepingen" id="" required>
      <input class="form-control" type="number" placeholder="AantalKamers" name="aantalKamers" id="" required>
      <input class="form-control" type="number" placeholder="Breedte" name="breedte" id="" required>
      <input class="form-control" type="number" placeholder="Hoogte" name="hoogte" id="" required>
      <input class="form-control" type="number" placeholder="Diepte" name="diepte" id="" required>
      <input class="form-control" type="number" placeholder="Prijs per m2" name="prijs_m2" id="" required>

      <div class="form-check">
        <input value="0" class="" type="radio" name="isKoopwoning" id="">
        <label for="isKoopwoning">Huur</label>

        <input value="1" type="radio" name="isKoopwoning" id="">
        <label for="isKoopwoning">Koop</label>
      </div>

      <div class="form-group">
        <label for="WoningStatus_idWoningStatus" class="block mt">Status</label>
        <select class="form-control" name="WoningStatus_idWoningStatus" id="" class="mb">
          <? 
          foreach ($statussen as $status) { 
            echo '<option value="' . $status['idWoningStatus'] . '"> ' . $status['woningStatusNaam'] .  ' </option>'; 
            } 
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="" class="block mt">Soort</label>
        <select class="form-control" name="WoningSoort_idWoningSoort" id="" class="mb">
          <? 
          foreach ($soorten as $soort) { 
            echo '<option value="' . $soort['idWoningSoort'] . '"> ' . $soort['woningSoortNaam'] .  ' </option>'; 
            } 
          ?>
        </select>
      </div>

      <input type="submit" value="Opslaan">
    </form>
  </div>

  <?php

  ?>
</body>