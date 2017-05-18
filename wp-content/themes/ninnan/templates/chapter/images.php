<?php
$images = get_sub_field('images');
if ($images) {
  $pagination = get_sub_field('paginering');
  $title = get_sub_field('title');
  $url_safe_title = selectorSafeString($title);
?>
<section
  class="Section Section--images Section--gray js-chapterSection"
  data-pagination="<?php echo $pagination; ?>"
  id="page-<?php echo $pagination; ?>-<?php echo $url_safe_title; ?>">

  <div class="Section Section--small">
    <?php if ($title) { ?>
    <h1 class="Section-title"><?php echo $title; ?></h1>
    <?php } ?>
  </div>

  <div class="Site-container">
    <div class="Section">
      <?php
      if ($images) {
        foreach( $images as $image ) {
          if ($image['sizes']['large']) {
      ?>
      <figure class="Figure" id="<?php echo $image['title']; ?>">
        <img class="Figure-image js-lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
        <noscript><img class="Figure-image" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>"></noscript>
        <figcaption class="Figure-caption"><?php echo $image['caption']; ?></figcaption>
      </figure>
      <?php
          }
        }
      }
      ?>
    </div>
  </div>

</section>
<?php } ?>
