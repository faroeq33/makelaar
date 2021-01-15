<?php
include "dbConfig.php";
include "layout/header.php";
include "includes/preparedInsert.php";
include "includes/preparedSelect.php";

prepared_insert($conn, "Huis", $_POST['form']);

$lastInsert = $conn->lastInsertId();


$ding = prepared_select($conn, "SELECT idHuis FROM Huis WHERE idHuis =" . $lastInsert);
?>

<body>
  <div class="container mt">

    <div class="alert alert-success">
      Het huis met de huiscode :<b>
        <? echo $lastInsert ?>
      </b> is ingevuld
    </div>
    <a href="woningoverzicht.php">Terug naar overzicht</a>
  </div>
</body>