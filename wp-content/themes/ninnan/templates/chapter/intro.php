<?php
$pagination = get_sub_field('paginering') ? get_sub_field('paginering') : get_field('chapter_pagination', $post->ID);
$title = get_the_title();
$url_safe_title = selectorSafeString($title);
?>

<div
  class="Section Section--black Section-chapterIntro js-chapterSection"
  data-pagination="<?php echo $pagination; ?>"
  id="page-<?php echo $pagination; ?>-<?php echo $url_safe_title; ?>">
  <div>
    <?php if ($pagination && strlen($pagination) > 0) { ?>
    <p class="Section-chapterIntroTitle"><?php echo $pagination; ?></p>
    <?php } ?>
    <?php if ($title && strlen($title) > 0) { ?>
    <h1 class="Section-chapterIntroTitle"><?php echo $title; ?></h1>
    <?php } ?>
  </div>
</div>
