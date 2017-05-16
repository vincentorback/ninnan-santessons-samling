<?php
$pagination = get_sub_field('paginering');
?>

<section class="Section--split Grid Grid--equalHeight js-chapterSection" data-pagination="<?php echo $pagination; ?>">
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
    $slideshow_images = get_sub_field('slideshow');
    $imageCount = count($slideshow_images);
    $slideshow_id = uniqid();
    ?>
    <figure class="Slideshow Slideshow--sticky js-slideshow" id="<?php echo $slideshow_id; ?>" data-slides="<?php echo $imageCount; ?>" data-loaded="0">
      <div class="Slideshow-slider js-slideshowSlider">
        <?php foreach( $slideshow_images as $slideshow_image ) { ?>
        <div class="Slideshow-item js-slideshowItem" data-caption="<?php echo $slideshow_image['caption']; ?>">
          <img
          class="Slideshow-itemImage js-lazy"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
          data-src="<?php echo $slideshow_image['sizes']['large']; ?>"
          <?php if ($imageCount > 1) { ?>data-slideshow="<?php echo $slideshow_id; ?>"<?php } ?>
          alt="<?php echo $slideshow_image['alt']; ?>">
        </div>
        <?php } ?>
      </div>
      <div class="Slideshow-info">
        <div class="Slideshow-infoPagination js-slideshowPagination">1/<?php echo $imageCount; ?></div>
        <div class="Slideshow-infoCredits js-slideshowCaption"><?php echo $slideshow_images[0]['caption']; ?></div>
      </div>
    </figure>
  </div>
</section>
