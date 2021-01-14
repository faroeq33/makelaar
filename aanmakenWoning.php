<?php
include "dbConfig.php";
include "layout/header.php";
?>
<h2>Voeg een woonwijk toe</h2>

<form action="verwerking/aanmakenWoningVerwerking.php" method="POST" class="form ml">

  <input type="number" placeholder="AantalVerdiepingen" name="form[aantalVerdiepingen]" id="" required>
  <input type="number" placeholder="AantalKamers" name="form[aantalKamers]" id="" required>
  <input type="number" placeholder="Breedte" name="form[breedte]" id="" required>
  <input type="number" placeholder="Hoogte" name="form[hoogte]" id="" required>
  <input type="number" placeholder="Diepte" name="form[diepte]" id="" required>
  <input type="number" placeholder="Prijs per m2" name="form[prijs_m2]" id="" required>
  <div>
    <input value="0" type="radio" name="form[isKoopwoning]" id="">
    <label for="form[isKoopwoning]">Huur</label>

    <input value="1" type="radio" name="form[isKoopwoning]" id="">
    <label for="form[isKoopwoning]">Koop</label>
  </div>
  <input type="text" placeholder="woonwijkNaam" name="form[woonwijkNaam]" id="">

  <label for="woningSoortNaam" class="block">Soort Woning</label>
  <select name="form[woningSoortNaam]" id="">
    <option value="flat">flat</option>
    <option value="apartment">apartment</option>
    <option value="gezinshuis">gezinshuis</option>
    <option value="rijwoning">rijwoning</option>
  </select>

  <label for="woningStatusNaam" class="block mt">Status</label>
  <select name="form[woningStatusNaam]" id="">
    <option value="Te Huur">Te Huur</option>
    <option value="Te Koop">Te Koop</option>
    <option value="Verhuurd">Verhuurd</option>
    <option value="Verkocht onder voorbehoud">Verkocht onder voorbehoud</option>
  </select>
  <input class="mt" type="submit" value="Aanmaken">
</form>