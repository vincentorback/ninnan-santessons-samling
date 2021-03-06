<section class="Section Section--index Section--gray" id="index">
  <div class="Site-container">
    <h1 class="Section-title">
      <a class="Section-titleLink" href="#index">Index</a>
    </h1>

    <div class="Index Grid">


      <!-- Förord -->
      <?php
      $forewords_page = getCustomPage('Förord');
      if ($forewords_page) {
        $forewords_pagination = get_field('pagination', $forewords_page->ID);
        $forewords_image = get_field('thumbnail', $forewords_page->ID);
        $forewords_image = wp_get_attachment_image_src($forewords_image, 'thumbnail');
        if ($forewords_image && $forewords_page) {
      ?>
      <div class="Grid-cell u-xs-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#<?php echo $forewords_page->post_name; ?>">
          <div class="Index-itemContent">
            <img
              class="Index-itemImage js-lazy"
              data-src="<?php echo $forewords_image[0]; ?>"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs="
              alt="">
            <noscript><img class="Index-itemImage" src="<?php echo $forewords_image[0]; ?>" alt=""></noscript>
            <div class="Index-itemInfo">
              <div>
                <p><?php echo $forewords_page->post_title; ?></p>
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
            $image = wp_get_attachment_image_src($thumbnail, 'thumbnail');

      ?>


      <!-- Kapitel intro -->
      <div class="Grid-cell u-xs-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#<?php echo $pagination; ?>-<?php echo $url_safe_title ?>">
          <div class="Index-itemContent">
            <img
              class="Index-itemImage js-lazy"
              data-src="<?php echo $image[0]; ?>"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs="
              alt="">
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
            $image = wp_get_attachment_image_src($thumbnail, 'thumbnail');
      ?>
      <div class="Grid-cell u-xs-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#<?php echo $pagination; ?>-<?php echo $url_safe_title ?>">
          <div class="Index-itemContent">
            <img
              class="Index-itemImage js-lazy"
              data-src="<?php echo $image[0]; ?>"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs="
              alt="">
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
          $afterwords_image = wp_get_attachment_image_src($afterwords_image, 'thumbnail');
          if ($afterwords_image && $afterwords_page) {
      ?>
      <div class="Grid-cell u-xs-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#<?php echo $afterwords_page->post_name; ?>">
          <div class="Index-itemContent">
            <img
              class="Index-itemImage js-lazy"
              data-src="<?php echo $afterwords_image[0]; ?>"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs="
              alt="">
            <noscript><img class="Index-itemImage" src="<?php echo $afterwords_image[0]; ?>" alt=""></noscript>
            <div class="Index-itemInfo">
              <div>
                <p><?php echo $afterwords_page->post_title; ?></p>
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
          $about_image = wp_get_attachment_image_src($about_image, 'thumbnail');
          if ($about_image && $about_page) {
      ?>
      <div class="Grid-cell u-xs-size1of2 u-md-size1of3 u-lg-size1of5">
        <a
        class="Index-item"
        href="#about">
          <div class="Index-itemContent">
            <img
              class="Index-itemImage js-lazy"
              data-src="<?php echo $about_image[0]; ?>"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs="
              alt="">
            <noscript><img class="Index-itemImage" src="<?php echo $about_image[0]; ?>" alt=""></noscript>
            <div class="Index-itemInfo">
              <div>
                <p><?php echo $about_page->post_title; ?></p>
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
