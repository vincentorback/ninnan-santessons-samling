<?php
$pagination = get_sub_field('paginering');
$title = get_sub_field('text_title');
$text = get_sub_field('text');
?>

<section
  class="Section Section--text Section--black js-chapterSection"
  data-pagination="<?php echo $pagination; ?>"
  id="<?php echo $pagination; ?>-<?php echo urlencode($title); ?>">
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
