<?php
$images = get_sub_field('images');
if ($images) {
  $pagination = get_sub_field('paginering');
  $title = get_sub_field('title');
  $url_safe_title = selectorSafeString($title);
  $section_id = $pagination . '-' . $url_safe_title;
?>
<section
  class="Section Section--images Section--gray js-chapterSection"
  data-pagination="<?php echo $pagination; ?>"
  id="<?php echo $section_id; ?>">

  <?php if ($title) { ?>
  <div class="Section Section--small">
    <h1 class="Section-title">
      <a class="Section-titleLink" href="#<?php echo $section_id; ?>"><?php echo $title; ?></a>
    </h1>
  </div>
  <?php } ?>

  <div class="Site-container">
    <div class="Section">
      <?php
      if ($images) {
        foreach( $images as $image ) {
      ?>
      <figure class="Figure" id="<?php echo $image['title']; ?>">
        <img
          class="Figure-image js-lazy"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
          sizes="100vw"
          data-srcset="<?php echo $image['sizes']['large']; ?> 1600w,
            <?php echo $image['sizes']['medium']; ?> 1000w,
            <?php echo $image['sizes']['thumbnail']; ?> 500w"
          data-src="<?php echo $image['sizes']['large']; ?>"
          alt="<?php echo $image['alt']; ?>">
        <noscript><img class="Figure-image" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>"></noscript>
        <?php if ($image['caption']) { ?>
        <figcaption class="Figure-caption"><?php echo $image['caption']; ?></figcaption>
        <?php } ?>
      </figure>
      <?php
        }
      }
      ?>
    </div>
  </div>

</section>
<?php } ?>
