<?php
function prepared_select($connection, $sql)
{
  $stmt = $connection->prepare($sql);
  $stmt->execute();

  // set the resulting array to associative
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  return $stmt->fetchAll();
}
