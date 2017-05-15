<?php
$chapter_number = get_field('chapter_number');
?>

<div class="Chapter js-chapter" id="chapter_<?php echo $chapter_number; ?>">
  <span class="Chapter-number">
    <span class="Chapter-numberInner"><?php echo $chapter_number; ?></span>
  </span>

  <?php require('chapter/intro.php'); ?>

  <?php if( have_rows('chapter_content') ): ?>
    <?php while ( have_rows('chapter_content') ) : the_row();
      if ( get_row_layout() == 'text' ) {
      	require('chapter/text.php');
      } else if (get_row_layout() == 'text_with_slideshow' ) {
        require('chapter/text-with-slideshow.php');
      } else if (get_row_layout() == 'images' ) {
        require('chapter/images.php');
      }
    endwhile; ?>

  <?php endif; ?>

</div>
