<?php get_header(); ?>
<?php if (is_user_logged_in()) { ?>


  <!-- Förord -->
  <?php require_once('templates/forewords.php'); ?>


  <!-- Kapitel -->
  <div class="Chapters">
    <?php
    $args = array(
      'post_type' => 'chapter',
      'order' => 'ASC',
      'orderby' => 'menu_order',
      'posts_per_page' => -1
    );
    $post_query = new WP_Query($args);

    $start_pagination = get_field('chapter_pagination', $post_query->posts[0]->ID);
    ?>
    <span class="Chapters-pagination">
      <span class="Chapters-paginationInner js-chapterPagination"><?php echo $start_pagination; ?></span>
    </span>

    <?php
    if ($post_query->have_posts()) {
      while ($post_query->have_posts()) {
        $post_query->the_post();

        require('templates/chapter.php');
      }
    }
    ?>
  </div>


  <!-- Efterord -->
  <?php require_once('templates/afterwords.php'); ?>


  <!-- Om projektet -->
  <?php require_once('templates/about.php'); ?>


  <!-- Index -->
  <?php require_once('templates/index.php'); ?>


<?php } ?>
<?php get_footer(); ?>
