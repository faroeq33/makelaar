<?php
include "dbConfig.php";
?>
<h2>Voeg een Status toe</h2>


<form action="verwerking/aanmakenWijkVerwerking.php" method="POST">
  <input type="text" name="form[statusNaam]" required>
  <input type="submit" value="Verzenden">
</form>