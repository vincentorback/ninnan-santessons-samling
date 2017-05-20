<section class="Section Section--index Section--gray" id="index">
  <div class="Site-container">
    <h1 class="Section-title">Index</h1>

    <div class="Index Grid">


      <!-- Förord -->
      <?php
      $forewords_page = getCustomPage('Förord');
      if ($forewords_page) {
        $forewords_pagination = get_field('pagination', $forewords_page->ID);
        $forewords_image = get_field('thumbnail', $forewords_page->ID);
        $forewords_image = wp_get_attachment_image_src($forewords_image);
        if ($forewords_image && $forewords_page) {
      ?>
      <div class="Grid-cell u-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#forord">
          <div class="Index-itemContent">
            <img class="Index-itemImage js-lazy" data-src="<?php echo $forewords_image[0]; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
            <noscript><img class="Index-itemImage" src="<?php echo $forewords_image[0]; ?>"></noscript>
            <div class="Index-itemInfo">
              <div>
                <p>Förord</p>
              </div>
            </div>
          </div>
          <?php if ($forewords_pagination) { ?>
          <p class="Index-itemTitle"><?php echo $forewords_pagination; ?></p>
          <?php } ?>
        </a>
      </div>
      <?php } } ?>


      <!-- Kapitel -->
      <?php
      $args = array(
        'post_type' => 'chapter',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => -1
      );
      $post_query = new WP_Query($args);

      if ($post_query->have_posts()) {
        while ($post_query->have_posts()) {
          $post_query->the_post();

          $pagination = get_sub_field('paginering') ? get_sub_field('paginering') : get_field('chapter_pagination', $post->ID);
          $title = get_the_title();
          $url_safe_title = selectorSafeString($title);
          $thumbnail = get_field('thumbnail');

          if ($thumbnail && $title && $pagination) {
            $image = wp_get_attachment_image_src($thumbnail);

      ?>


      <!-- Kapitel intro -->
      <div class="Grid-cell u-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#page-<?php echo $pagination; ?>-<?php echo $url_safe_title ?>">
          <div class="Index-itemContent">
            <img class="Index-itemImage js-lazy" data-src="<?php echo $image[0]; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
            <noscript><img class="Index-itemImage" src="<?php echo $image[0]; ?>" alt=""></noscript>
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
      </div>
      <?php } ?>


      <!-- Kapitel innehåll -->
      <?php
      if (have_rows('chapter_content')) {
        while (have_rows('chapter_content')) {
          the_row();

          $thumbnail = get_sub_field('thumbnail');
          $pagination = get_sub_field('paginering');
          $title = get_sub_field('title');

          if (!$title) {
            $title = get_sub_field('text_title');
          }

          if ($thumbnail && $title && $pagination) {
            $url_safe_title = selectorSafeString($title);
            $image = wp_get_attachment_image_src($thumbnail);
      ?>
      <div class="Grid-cell u-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#page-<?php echo $pagination; ?>-<?php echo $url_safe_title ?>">
          <div class="Index-itemContent">
            <img class="Index-itemImage js-lazy" data-src="<?php echo $image[0]; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
            <noscript><img class="Index-itemImage" src="<?php echo $image[0]; ?>" alt=""></noscript>
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
      </div>
      <?php
              }
            }
          }
        }
      }
      ?>


      <!-- Efterord -->
      <?php
        $afterwords_page = getCustomPage('Efterord');
        if ($afterwords_page) {
          $afterwords_pagination = get_field('pagination', $afterwords_page->ID);
          $afterwords_image = get_field('thumbnail', $afterwords_page->ID);
          $afterwords_image = wp_get_attachment_image_src($afterwords_image);
          if ($afterwords_image && $afterwords_page) {
      ?>
      <div class="Grid-cell u-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#efterord">
          <div class="Index-itemContent">
            <img class="Index-itemImage js-lazy" data-src="<?php echo $afterwords_image[0]; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
            <noscript><img class="Index-itemImage" src="<?php echo $afterwords_image[0]; ?>" alt=""></noscript>
            <div class="Index-itemInfo">
              <div>
                <p>Efterord</p>
              </div>
            </div>
          </div>
          <?php if ($afterwords_pagination) { ?>
          <p class="Index-itemTitle"><?php echo $afterwords_pagination; ?></p>
          <?php } ?>
        </a>
      </div>
      <?php } } ?>


      <!-- Om projektet -->
      <?php
        $about_page = getCustomPage('Om projektet');
        if ($about_page) {
          $about_pagination = get_field('pagination', $about_page->ID);
          $about_image = get_field('thumbnail', $about_page->ID);
          $about_image = wp_get_attachment_image_src($about_image);
          if ($about_image && $about_page) {
      ?>
      <div class="Grid-cell u-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#about">
          <div class="Index-itemContent">
            <img class="Index-itemImage js-lazy" data-src="<?php echo $about_image[0]; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
            <noscript><img class="Index-itemImage" src="<?php echo $about_image[0]; ?>" alt=""></noscript>
            <div class="Index-itemInfo">
              <div>
                <p>Om projektet</p>
              </div>
            </div>
          </div>
          <?php if ($about_pagination) { ?>
          <p class="Index-itemTitle"><?php echo $about_pagination; ?></p>
          <?php } ?>
        </a>
      </div>
      <?php
        }
      }
      ?>


    </div>
  </div>
</section>
