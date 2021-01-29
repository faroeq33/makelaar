<?php

function prepared_update($connection, $query, array $form)
{
  $instance = $connection->prepare($query);

  foreach ($form as $key => $value) {
    $instance->bindValue($key, $value);
  }

  $instance->execute();
}

function prepared_insert($connection, $query, array $form)
{
  $instance = $connection->prepare($query);

  foreach ($form as $key => $value) {
    $instance->bindValue($key, $value);
  }

  $instance->execute();
}

// Let op als je een where statement gebruikt dat je wel een array met de waardes van het formulier meegeeft!!!

function prepared_select($connection, $query, array $form = null)
{
  $instance = $connection->prepare($query);

  if (!is_null($form)) {
    foreach ($form as $key => $value) {
      $instance->bindValue($key, $value);
    }
  }

  $instance->execute();

  return $instance->fetchall(PDO::FETCH_ASSOC);
}
