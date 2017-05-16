<?php
$pagination = get_sub_field('paginering') ? get_sub_field('paginering') : get_field('chapter_pagination', $post->ID);
?>

<div class="Section Section--black Section-chapterIntro js-chapterSection" data-pagination="<?php echo $pagination; ?>">
  <div>
    <p class="Section-chapterIntroTitle"><?php echo sprintf('%02d', $post->menu_order); ?></p>
    <h1 class="Section-chapterIntroTitle"><?php the_title(); ?></h1>
  </div>
  <!-- <a class="Section-scrollDown">&darr;</a> -->
</div>
