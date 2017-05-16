<?php
$args = array(
  'post_type' => 'chapter',
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'posts_per_page' => -1
);
$post_query = new WP_Query($args);

if ($post_query->have_posts()) { ?>
  <section class="Section Section--index Section--gray" id="index">
    <div class="Site-container">
      <h1 class="Section-title">Index</h1>

      <div class="Index Grid">
      <?php
      while ($post_query->have_posts()) {
        $post_query->the_post();

        if (have_rows('chapter_content')) {
          while (have_rows('chapter_content')) {
            the_row();

            $thumbnail = get_sub_field('thumbnail');
            if ($thumbnail) {
              $image = wp_get_attachment_image_src($thumbnail);
              $pagination = get_sub_field('paginering');
              $title = get_sub_field('title');

              if (!$title) {
                $title = get_sub_field('text_title');
              }

              if (!$title) {
                $title = '';
              }
      ?>

        <a
        class="Index-item Grid-cell u-xs-size1of2 u-size1of2 u-md-size1of3 u-lg-size1of5"
        href="#<?php echo $pagination; ?>-<?php echo urlencode($title); ?>">
          <div class="Index-itemContent">
            <img class="Index-itemImage js-lazy" data-src="<?php echo $image[0]; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
            <div class="Index-itemInfo">
              <div>
                <p><?php echo $title; ?></p>
              </div>
            </div>
          </div>
          <?php if ($pagination) { ?>
          <p class="Index-itemTitle"><?php echo $pagination; ?></p>
          <?php } ?>
        </a>

      <?php
            }
          }
        }
      }
      ?>

      </div>
    </div>
  </section>
<?php } ?>
