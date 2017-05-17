<?php
$pagination = get_sub_field('paginering');
$text = get_sub_field('text');
$title = get_sub_field('text_title');
$url_safe_title = selectorSafeString($title);
?>

<section
  class="Section Section--text Section--black js-chapterSection"
  data-pagination="<?php echo $pagination; ?>"
  id="page-<?php echo $pagination; ?>-<?php echo $url_safe_title; ?>">
  <div class="Site-container Site-container--narrow">

    <?php if ($title) { ?>
    <h1 class="Section-title"><?php echo $title; ?></h1>
    <?php } ?>

    <?php if ($text) { ?>
    <div class="Type">
      <?php echo $text;; ?>
    </div>
    <?php } ?>

  </div>
</section>
