<?php
$pagination = get_sub_field('paginering');
$title = get_sub_field('text_title');
$text = get_sub_field('text');
$url_safe_title = selectorSafeString($title);
$section_id = $pagination . '-' . $url_safe_title;
?>

<section
  class="Section Section--letter Grid Grid--equalHeight js-chapterSection"
  data-pagination="<?php echo $pagination; ?>"
  id="<?php echo $section_id; ?>">
  <div class="Grid-cell u-md-size1of2">
    <div class="u-size1of1">

      <?php if ($title) { ?>
      <div class="Section Section--white Section--small">
        <h1 class="Section-title">
          <a class="Section-titleLink" href="#<?php echo $section_id; ?>"><?php echo $title; ?></a>
        </h1>
      </div>
      <?php } ?>

      <?php if ($text) { ?>
      <div class="Section Section--white Section--small">
        <div class="Section-text">
          <div class="Type">
            <?php echo $text; ?>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>
  <div class="Grid-cell u-md-size1of2">

    <?php
    $slideshow_images = get_sub_field('slideshow');
    $imageCount = count($slideshow_images);
    $slideshow_id = uniqid();
    ?>
    <figure class="Slideshow Slideshow--sticky js-slideshow" id="<?php echo $slideshow_id; ?>" data-slides="<?php echo $imageCount; ?>">
      <?php if ($slideshow_images) { ?>
      <div class="Slideshow-slider js-slideshowSlider">
        <?php foreach ($slideshow_images as $slideshow_image) { ?>
        <div class="Slideshow-item js-slideshowItem" data-caption="<?php echo $slideshow_image['caption']; ?>">
          <img
          class="Slideshow-itemImage js-lazy"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs="
          sizes="(max-width: 800px) 100vw, 50vw"
          data-srcset="<?php echo $slideshow_image['sizes']['medium']; ?> 1000w,
            <?php echo $slideshow_image['sizes']['thumbnail']; ?> 500w"
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
      <figcaption class="Slideshow-info">
        <div class="Slideshow-infoPagination js-slideshowPagination">1/<?php echo $imageCount; ?></div>
        <div class="Slideshow-infoCredits js-slideshowCaption"><?php echo $slideshow_images[0]['caption']; ?></div>
      </figcaption>
      <?php } ?>
    </figure>

  </div>

</section>
