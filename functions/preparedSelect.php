<?php
function prepared_select($pdo, $sql)
{
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  // set the resulting array to associative
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  return $stmt->fetchAll();
}
