<?php
$pagination = get_sub_field('paginering');
$text = get_sub_field('text');
$title = get_sub_field('text_title');
$url_safe_title = selectorSafeString($title);
$background = get_sub_field('background') ? get_sub_field('background') : '#111';
$section_id = $pagination . '-' . $url_safe_title;
?>

<?php if ($title || $text) { ?>
<section
  class="Section Section--text Section--black js-chapterSection"
  style="background-color:<?php echo $background; ?>"
  data-pagination="<?php echo $pagination; ?>"
  id="<?php echo $section_id; ?>">
  <div class="Site-container Site-container--narrow">

    <?php if ($title) { ?>
    <h1 class="Section-title">
      <a class="Section-titleLink" href="#<?php echo $section_id; ?>"><?php echo $title; ?></a>
    </h1>
    <?php } ?>

    <?php if ($text) { ?>
    <div class="Type">
      <?php echo $text;; ?>
    </div>
    <?php } ?>

  </div>
</section>
<?php } ?>
