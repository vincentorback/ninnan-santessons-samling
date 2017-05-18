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

function getCustomPage($title = '') {
  $by_title = get_page_by_title($title);

  if ($by_title) {
    return $by_title;
  }

  /* TODO: Comments are local, change these. */
  $pages = array(
    'Förord' => 2, // 43
    'Efterord' => 44, // 45
    'Om projektet' => 42 // 47
  );

  $page = get_page($pages[$title]);

  if ($page) {
    return $page;
  } else {
    return false;
  }
}
