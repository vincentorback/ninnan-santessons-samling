<?php
$pagination = get_sub_field('paginering') ? get_sub_field('paginering') : get_field('chapter_pagination', $post->ID);
$title = get_the_title();
$url_safe_title = selectorSafeString($title);
$section_id = $pagination . '-' . $url_safe_title;
?>

<?php if ($pagination || $title) { ?>
<div
  class="Section Section--black Section-chapterIntro js-chapterSection"
  data-pagination="<?php echo $pagination; ?>"
  id="<?php echo $section_id; ?>">
  <div>
    <?php if ($pagination) { ?>
    <p class="Section-chapterIntroTitle"><?php echo $post->menu_order; ?></p>
    <?php } if ($title) { ?>
    <h1 class="Section-chapterIntroTitle">
      <a class="Section-chapterIntroTitleLink" href="#<?php echo $section_id; ?>"><?php echo $title; ?></a>
    </h1>
    <?php } ?>
  </div>
</div>
<?php } ?>
