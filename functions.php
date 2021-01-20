<?php
$array = [
  'preparedInsert',
  'preparedSelect',
  'Table',
  'preparedUpdate',
];

foreach ($array as $filename) {
  require "functions/{$filename}" . ".php";
}
