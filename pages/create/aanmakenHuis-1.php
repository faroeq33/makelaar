<?php
include "/makelaar/config.php";

$wijkenRaw = prepared_select($conn, "SELECT * FROM Woonwijk");

$wijken = array_map("getWijk", $wijkenRaw);

$soortRaw = prepared_select($conn, "SELECT * FROM WoningSoort");

$soorten = array_map("getSoort", $soortRaw);

?>

<body>
  <div class="container">

    <h2 class="mt ml" style="margin-left:0.5em">Voeg een woonwijk toe</h2>

    <form action="aanmakenHuis-2.php" method="POST" class="ml form">
      <label for="woonwijkNaam" class="block">Woonwijk</label>

      <select class="form-control" name="form[Woonwijk_idWoonwijk]" id="">
        <?
    foreach ($wijken as $value) {
      echo '<option value="' . $value['id'] . '"> ' . $value['woonwijkNaam'] .  ' </option>';
    }
    ?>
      </select>

      <input type="number" class="form-control" placeholder="AantalVerdiepingen" name="form[aantalVerdiepingen]" id="" required>
      <input class="form-control" type="number" placeholder="AantalKamers" name="form[aantalKamers]" id="" required>
      <input class="form-control" type="number" placeholder="Breedte" name="form[breedte]" id="" required>
      <input class="form-control" type="number" placeholder="Hoogte" name="form[hoogte]" id="" required>
      <input class="form-control" type="number" placeholder="Diepte" name="form[diepte]" id="" required>
      <input class="form-control" type="number" placeholder="Prijs per m2" name="form[prijs_m2]" id="" required>

      <div class="form-check">
        <input value="0" class="" type="radio" name="form[isKoopwoning]" id="">
        <label for="form[isKoopwoning]">Huur</label>

        <input value="1" type="radio" name="form[isKoopwoning]" id="">
        <label for="form[isKoopwoning]">Koop</label>
      </div>

      <div class="form-group">
        <label for="" class="block mt">Status</label>
        <select class="form-control" name="form[WoningSoort_idWoningSoort]" id="" class="mb">
          <option value="1">TeHuur</option>
          <option value="2">Te Koop</option>
          <option value="3">Verhuurd</option>
          <option value="4">Verkocht onder voorbehoud</option>
        </select>
      </div>

    </form>
  </div>

  <?php

  ?>
</body>