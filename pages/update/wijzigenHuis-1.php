  <?php echo
  require "/opt/lampp/htdocs/makelaar-php/config.php";

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

      <form action="wijzigenHuis-2.php" method="POST" class="ml form">
        <label for="form[Woonwijk_idWoonwijk]" class="block">Woonwijk</label>

        <select class="form-control" name="form[Woonwijk_idWoonwijk]" id="">
          <?php
          foreach ($wijken as $wijk) {
            echo '<option value="' . $wijk['id'] . '">' . $wijk['naam'] . '</option>';
          }
          ?>
        </select>
        <input type="hidden" name="form[idHuis]" value="<? echo $huis['idHuis']?>">
        <input type="number" class="form-control" placeholder="AantalVerdiepingen" name="form[aantalVerdiepingen]" id="" value="<?php echo  $huis['aantalVerdiepingen'] ?>" required>

        <input value="<?php echo  $huis['aantalKamers'] ?>" class="form-control" type="number" placeholder="aantalkamers" name="form[aantalKamers]" id="" required>

        <input value="<?php echo  $huis['breedte'] ?>" class="form-control" type="number" placeholder="Breedte" name="form[breedte]" id="" required>

        <input value="<?php echo  $huis['hoogte'] ?>" class="form-control" type="number" placeholder="Hoogte" name="form[hoogte]" id="" required>

        <input value="<?php echo  $huis['diepte'] ?>" class="form-control" type="number" placeholder="Diepte" name="form[diepte]" id="" required>

        <input value="<?php echo  $huis['prijs_m2'] ?>" class="form-control" type="number" placeholder="Prijs per m2" name="form[prijs_m2]" id="" required>

        <div class="form-check">
          <input value="0" class="" type="radio" name="form[isKoopwoning]" checked>
          <label for="form[isKoopwoning]">Huur</label>

          <input value "1" type="radio" name="form[isKoopwoning]" id="">
          <label for="form[isKoopwoning]">Koop</label>
        </div>

        <div class="form-group">
          <label for="form[WoningStatus_idWoningStatus]" class="block mt">Status</label>
          <select class="form-control" name="form[WoningStatus_idWoningStatus]" id="" class="mb">
            <option value="1">Te huur</option>
            <option value="2">Te koop</option>
            <option value="3">Verhuurd</option>
            <option value="4">Verkocht onder voorbehoud</option>
          </select>
        </div>

        <div class="form-group">
          <label for="" class="block mt">Soort</label>
          <select class="form-control" name="form[WoningSoort_idWoningSoort]" id="" class="mb">
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