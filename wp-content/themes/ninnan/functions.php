<?php

require(get_template_directory() . '/functions/clean.php');
require(get_template_directory() . '/functions/wysiwyg.php');
require(get_template_directory() . '/functions/cpt_chapter.php');

function selectorSafeString($string) {
  $string = strtr($string,
    array(
      ' ' => '',
      '.' => '',
      ',' => '',
      '/' => ''
    )
  );

  return $string;
}
