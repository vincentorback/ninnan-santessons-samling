<?php
$chapter_number = get_field('chapter_number');
?>

<div class="Section Section--black Section-chapterIntro">
  <div>
    <p class="Section-chapterIntroTitle"><?php echo $chapter_number; ?></p>
    <h1 class="Section-chapterIntroTitle"><?php the_title(); ?></h1>
  </div>
</div>
