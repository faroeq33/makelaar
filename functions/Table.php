<?php

class TableRows extends RecursiveIteratorIterator
{
  function __construct($it)
  {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current()
  {
    return "<tr><td style='width:150px;'>" . parent::current() . "</td></tr>";
  }

  function beginChildren()
  {
    echo "<tr>";
  }

  function endChildren()
  {
    echo "</tr>" . "\n";
  }
}
