<?php
$about_page = getCustomPage('Om projektet');
if ($about_page) {
  $images = get_field('slideshow', $about_page->ID);
  $text = $about_page->post_content;
  $thanks = get_field('thanks', $about_page->ID);
?>
<section class="Section Section--gray Section--about" id="<?php echo $about_page->post_name; ?>">
  <div class="Site-container">

    <h1 class="Section-title"><?php echo $about_page->post_title; ?></h1>

    <div class="Grid Grid--withGutter">
      <div class="Grid-cell u-md-size2of3">

        <?php if ($text) { ?>
        <div class="Section-text">
          <div class="Type">
            <?php echo apply_filters('the_content', $text); ?>
          </div>
        </div>
        <?php } ?>

        <?php
        if ($images) {
          $slideshow_id = uniqid();
          $imageCount = count($images);
        ?>
        <br><br>
        <figure class="Slideshow Slideshow--small js-slideshow" id="<?php echo $slideshow_id; ?>" data-slides="<?php echo $imageCount; ?>" data-loaded="0">
          <div class="Slideshow-slider js-slideshowSlider">
            <?php foreach( $images as $image ) { ?>
            <div class="Slideshow-item js-slideshowItem">
              <img
              class="Slideshow-itemImage js-lazy"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
              data-src="<?php echo $image['sizes']['medium']; ?>"
              <?php if ($imageCount > 1) { ?>data-slideshow="<?php echo $slideshow_id; ?>"<?php } ?>
              alt="<?php echo $image['alt']; ?>">
              <noscript><img class="Slideshow-itemImage" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>"></noscript>
            </div>
            <?php } ?>
          </div>

          <?php if ($imageCount > 1) { ?>
          <div class="Slideshow-nav">
            <button class="Slideshow-navButton Slideshow-navButton--left is-reversed js-slideshowLeft" type="button">&larr;</button>
            <button class="Slideshow-navButton Slideshow-navButton--right js-slideshowRight" type="button">&rarr;</button>
          </div>

          <div class="Slideshow-buttonNav js-slideshowNav">
          <?php foreach( $images as $key=>$value ) { ?>
            <button class="Slideshow-buttonNavItem js-slideshowNavItem" data-index="<?php echo $key + 1; ?>">
              <span class="Slideshow-buttonNavItemInner"></span>
            </button>
          <?php } ?>
          </div>
          <?php } ?>

        </figure>
        <?php } ?>

        <br><br>
      </div>

      <div class="Grid-cell u-md-size1of3">

        <?php if ($thanks) { ?>
        <div class="Section-text">
          <div class="Type">
            <?php echo apply_filters('the_content', $thanks); ?>
          </div>
        </div>
        <?php } ?>

      </div>
    </div>

  </div>
</section>
<?php } ?>
