<?php

function prepared_update($pdo, $table, $id, $data)
{
  $keys = array_keys($data);
  $thingy = array_map(
    function ($x) {
      return $x . ":" . $x;
    },
    $keys
  );
  echo "<pre>";
  var_dump($thingy);
  echo "</pre>";
  die('end of script');
  $fields = implode(":,", $keys);
  $placeholders = str_repeat('=?,', count($keys) - 1) . '?';
  $sql = "UPDATE SET $table ($fields) VALUES ($placeholders)";
  echo "<pre>";
  var_dump($sql);
  echo "</pre>";
  die('end of script');
  $pdo->prepare($sql)->execute(array_values($data));
}
