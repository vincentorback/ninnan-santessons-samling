<?php
$images = get_sub_field('images');
if ($images) {
  $pagination = get_sub_field('paginering');
?>

<section class="Section Section--gray Section--images js-chapterSection" data-pagination="<?php echo $pagination; ?>">
  <div class="Site-container">
    <?php if ($images) { foreach( $images as $image ) { ?>
      <?php if ($image['sizes']['large']) { ?>
      <figure class="Figure">
        <img class="Figure-image js-lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
        <figcaption class="Figure-caption"><?php echo $image['caption']; ?></figcaption>
      </figure>
      <?php } ?>
    <?php } } ?>
  </div>
</section>

<?php } ?>
