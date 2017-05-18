<?php get_header(); ?>

<!-- Förord -->
<?php require_once('templates/forewords.php'); ?>


<!-- Kapitel -->
<div class="Page">
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
  <span class="Page-pagination">
    <span class="Page-paginationInner js-chapterPagination" data-default="<?php echo $start_pagination; ?>"><?php echo $start_pagination; ?></span>
  </span>

  <?php
  if ($post_query->have_posts()) {
    $chapter_number = 1;

    while ($post_query->have_posts()) {
      $post_query->the_post();

      require('templates/chapter.php');

      $chapter_number++;
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


<?php get_footer(); ?>
