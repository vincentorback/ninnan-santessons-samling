<?php
$pagination = get_sub_field('paginering');
$title = get_sub_field('text_title');
$url_safe_title = selectorSafeString($title);
?>

<section
  class="Section Section--letter Grid Grid--equalHeight js-chapterSection"
  data-pagination="<?php echo $pagination; ?>"
  id="page-<?php echo $pagination; ?>-<?php echo $url_safe_title; ?>">
  <div class="Grid-cell u-md-size1of2">
    <div class="u-size1of1">

      <div class="Section Section--white Section--small">
        <?php if ($title) { ?>
        <h1 class="Section-title"><?php echo $title; ?></h1>
        <?php } ?>
      </div>

      <div class="Section Section--white Section--small">
        <div class="Section-text">
          <div class="Type">
            <?php the_sub_field('text'); ?>
          </div>
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
      <?php if ($slideshow_images) { ?>
      <div class="Slideshow-slider js-slideshowSlider">
        <?php foreach ($slideshow_images as $slideshow_image) { ?>
        <div class="Slideshow-item js-slideshowItem" data-caption="<?php echo $slideshow_image['caption']; ?>">
          <img
          class="Slideshow-itemImage js-lazy"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
          data-src="<?php echo $slideshow_image['sizes']['medium']; ?>"
          <?php if ($imageCount > 1) { ?>data-slideshow="<?php echo $slideshow_id; ?>"<?php } ?>
          alt="<?php echo $slideshow_image['alt']; ?>">
          <noscript><img class="Slideshow-itemImage" src="<?php echo $slideshow_image['sizes']['medium']; ?>" alt="<?php echo $slideshow_image['alt']; ?>"></noscript>
        </div>
        <?php } ?>
      </div>
      <?php if ($imageCount > 1) { ?>
      <div class="Slideshow-nav">
        <button class="Slideshow-navButton Slideshow-navButton--left is-reversed js-slideshowLeft" type="button">&larr;</button>
        <button class="Slideshow-navButton Slideshow-navButton--right js-slideshowRight" type="button">&rarr;</button>
      </div>
      <?php } ?>
      <div class="Slideshow-info">
        <div class="Slideshow-infoPagination js-slideshowPagination">1/<?php echo $imageCount; ?></div>
        <div class="Slideshow-infoCredits js-slideshowCaption"><?php echo $slideshow_images[0]['caption']; ?></div>
      </div>
      <?php } ?>
    </figure>

  </div>

</section>
