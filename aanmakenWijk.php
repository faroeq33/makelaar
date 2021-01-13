<?php
include "dbConfig.php";
?>
<h2>Voeg een woonwijk toe</h2>


<form action="verwerking/aanmakenWijkVerwerking.php" method="POST">
  <input type="text" name="form[woonwijkNaam]" required>
  <input type="submit" value="Verzenden">
</form>