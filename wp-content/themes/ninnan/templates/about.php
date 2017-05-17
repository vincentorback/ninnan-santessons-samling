<?php
$about_page = get_page_by_title('Om projektet');
if ($about_page) {
?>
<section class="Section Section--gray Section--about" id="about">

  <div class="Site-container">
    <h1 class="Section-title">Om projektet</h1>

    <div class="Grid Grid--withGutter">
      <div class="Grid-cell u-md-size2of3">
        <div class="Section">
          <div class="Type">
            <?php echo apply_filters('the_content', $about_page->post_content); ?>
          </div>
          <?php
          $images = get_field('slideshow', $about_page->ID);

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
        </div>
      </div>
      <div class="Grid-cell u-md-size1of3">
        <div class="Section">
          <div class="Section-text">
            <div class="Type">
              <?php the_field('thanks', $about_page->ID); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
