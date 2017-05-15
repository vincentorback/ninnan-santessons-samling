<?php
$args = array(
  'post_type' => 'chapter',
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'posts_per_page' => -1
);
$post_query = new WP_Query($args);

if ($post_query->have_posts()) { ?>
  <section class="Section Section--gray Section--index" id="index">
    <div class="Site-container">
      <h1 class="Section-title">Index</h1>

      <div class="Index Grid">
      <?php while ($post_query->have_posts()) { $post_query->the_post(); ?>
        <?php
        $chapter_number = get_field('chapter_number');
        $image_id = get_field('chapter_thumbnail');

        if ($chapter_number && $image_id) {
          $image = wp_get_attachment_image_src($image_id, 'thumbnail');
          $image_src = $image[0];
        ?>

        <a class="Index-item Grid-cell u-md-size1of4" href="#chapter_<?php echo $chapter_number; ?>">
          <div class="Index-itemContent">
            <img class="Index-itemImage js-lazy" data-src="<?php echo $image_src; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
            <div class="Index-itemInfo">
              <div>
                <p>Ska fixa...</p>
              </div>
            </div>
          </div>
          <p class="Index-itemTitle"><?php echo $chapter_number; ?></p>
        </a>

      <?php } } ?>

      </div>
    </div>
  </section>
<?php } ?>
