<?php

function prepared_insert($pdo, $table, $data)
{
  $keys = array_keys($data);
  $fields = implode(",", $keys);
  $placeholders = str_repeat('?,', count($keys) - 1) . '?';
  $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
  $pdo->prepare($sql)->execute(array_values($data));
}
