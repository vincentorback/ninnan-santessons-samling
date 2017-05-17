<div id="chapter_<?php echo $chapter_number; ?>">
  <?php
  require('chapter/intro.php');

  if (have_rows('chapter_content')) {
    while (have_rows('chapter_content')) {
      the_row();

      if (get_row_layout() == 'text') {
      	require('chapter/text.php');
      } else if (get_row_layout() == 'text_with_slideshow') {
        require('chapter/text-with-slideshow.php');
      } else if (get_row_layout() == 'images') {
        require('chapter/images.php');
      }
    }
  }
  ?>
</div>
