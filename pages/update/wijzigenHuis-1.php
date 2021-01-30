  <?php

  include "../../config.php";
  include $rootFolder . "helpers/helpers.php";

  $formField = $_GET['idHuis'];

  $huisResult = prepared_select($conn, "SELECT * FROM Huis, Woonwijk, WoningSoort, WoningStatus WHERE idHuis =" . $formField . " AND Huis.WoningStatus_idWoningStatus = WoningStatus.idWoningStatus AND Huis.Woonwijk_idWoonwijk = Woonwijk.idWoonwijk AND Huis.WoningSoort_idWoningSoort = WoningSoort.idWoningSoort");
  $wijkenResult = prepared_select($conn, "SELECT * FROM Woonwijk");

  $huis = $huisResult[0];

  function getWijk($thing)
  {
    return [
      'id' => $thing['idWoonwijk'],
      'naam' => $thing['woonwijkNaam']
    ];
  };


  $wijken = array_map("getWijk", $wijkenResult);


  ?>

  <body>
    <div class="container">

      <h2 class="mt ml" style="margin-left:0.5em">Wijzig huis ID:
        <b>
          <? echo $formField ?>
        </b>toe
      </h2>

      <form action="/makelaar-php/pages/read/woningoverzicht.php" method="POST" class="ml form">
        <label for="Woonwijk_idWoonwijk" class="block">Woonwijk</label>

        <select class="form-control" name="Woonwijk_idWoonwijk" id="">
          <?php
          foreach ($wijken as $wijk) {
            echo '<option value="' . $wijk['id'] . '">' . $wijk['naam'] . '</option>';
          }
          ?>
        </select>
        <input type="hidden" name="idHuis" value="<? echo $huis['idHuis']?>">
        <input type="number" class="form-control" placeholder="AantalVerdiepingen" name="aantalVerdiepingen" id="" value="<?php echo  $huis['aantalVerdiepingen'] ?>" required>

        <input value="<?php echo  $huis['aantalKamers'] ?>" class="form-control" type="number" placeholder="aantalkamers" name="aantalKamers" id="" required>

        <input value="<?php echo  $huis['breedte'] ?>" class="form-control" type="number" placeholder="Breedte" name="breedte" id="" required>

        <input value="<?php echo  $huis['hoogte'] ?>" class="form-control" type="number" placeholder="Hoogte" name="hoogte" id="" required>

        <input value="<?php echo  $huis['diepte'] ?>" class="form-control" type="number" placeholder="Diepte" name="diepte" id="" required>

        <input value="<?php echo  $huis['prijs_m2'] ?>" class="form-control" type="number" placeholder="Prijs per m2" name="prijs_m2" id="" required>

        <div class="form-check">
          <label for="isKoopwoning">Huur</label>
          <input value="0" type="radio" name="isKoopwoning" checked>

          <label for="isKoopwoning">Koop</label>
          <input value="1" type="radio" name="isKoopwoning">
        </div>

        <div class="form-group">
          <label for="WoningStatus_idWoningStatus" class="block mt">Status</label>
          <select class="form-control" name="WoningStatus_idWoningStatus" id="" class="mb">
            <option value="1">Te huur</option>
            <option value="2">Te koop</option>
            <option value="3">Verhuurd</option>
            <option value="4">Verkocht onder voorbehoud</option>
          </select>
        </div>

        <div class="form-group">
          <label for="" class="block mt">Soort</label>
          <select class="form-control" name="WoningSoort_idWoningSoort" id="" class="mb">
            <option value="1">Flat</option>
            <option value="2">Apartement</option>
            <option value="3">Gezinshuis</option>
            <option value="4">Rijwoning</option>
          </select>
        </div>

        <input type="submit" value="Opslaan">
      </form>
    </div>
  </body>