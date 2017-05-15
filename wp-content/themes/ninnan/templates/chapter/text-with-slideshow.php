<section class="Section--split Grid Grid--equalHeight">
  <div class="Grid-cell u-md-size1of2">
    <div class="Section Section--white">
      <div class="Site-container">
        <?php if (get_sub_field('text_title')) { ?>
        <h1 class="Section-title"><?php the_sub_field('text_title'); ?></h1>
        <?php } ?>
        <div class="Type">
          <?php the_sub_field('text'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="Grid-cell u-md-size1of2">
    <?php
    $images = get_sub_field('slideshow');
    $imageCount = count($images);
    $slideshow_id = uniqid();
    ?>
    <figure class="Slideshow Slideshow--sticky js-slideshow" id="<?php echo $slideshow_id; ?>" data-slides="<?php echo $imageCount; ?>" data-loaded="0">
      <?php foreach( $images as $image ) { ?>
      <div class="Slideshow-item dragend-page">
        <img
        class="Slideshow-itemImage js-lazy"
        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
        data-src="<?php echo $image['sizes']['large']; ?>"
        <?php if ($imageCount > 1) { ?>data-slideshow="<?php echo $slideshow_id; ?>"<?php } ?>
        alt="<?php echo $image['alt']; ?>">
      </div>
      <?php } ?>
    </figure>
  </div>
</section>
