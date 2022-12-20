<?php 

  function get_words($sentence, $count = 10) {
    preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
    if(count(explode(" ", $matches[0])) > $count) $matches[0] = $matches[0]."...";
    return $matches[0];
  }

?>