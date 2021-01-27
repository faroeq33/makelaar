<?php

function prepared_update($connection, $sql, array $form)
{
  $instance = $connection->prepare($sql);

  foreach ($form as $key => $value) {
    $instance->bindValue($key, $value);
  }

  $instance->execute();
}

function prepared_insert($connection, $sql, array $form)
{
  $instance = $connection->prepare($sql);

  foreach ($form as $key => $value) {
    $instance->bindValue($key, $value);
  }

  $instance->execute();
}

// Let op als je een where statement gebruikt dat je wel een array met de waardes van het formulier meegeeft!!!

function prepared_select($connection, $sql, array $form = null)
{
  $instance = $connection->prepare($sql);

  if (!is_null($form)) {
    foreach ($form as $key => $value) {
      $instance->bindValue($key, $value);
    }
  }

  $instance->execute();

  return $instance->fetchall(PDO::FETCH_ASSOC);
}
