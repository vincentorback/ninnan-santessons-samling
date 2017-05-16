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
        $image_id = get_field('chapter_thumbnail');

        if ($image_id) {
          $image = wp_get_attachment_image_src($image_id, 'thumbnail');
          $image_src = $image[0];
        ?>

        <a class="Index-item Grid-cell u-sm-size1of2 u-md-size1of3 u-lg-size1of5" href="#chapter_<?php echo $post->menu_order; ?>">
          <div class="Index-itemContent">
            <img class="Index-itemImage js-lazy" data-src="<?php echo $image_src; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
            <div class="Index-itemInfo">
              <div>
                <p><?php the_title(); ?></p>
              </div>
            </div>
          </div>
          <p class="Index-itemTitle"><?php echo sprintf('%02d', $post->menu_order); ?></p>
        </a>

      <?php } } ?>

      </div>
    </div>
  </section>
<?php } ?>
