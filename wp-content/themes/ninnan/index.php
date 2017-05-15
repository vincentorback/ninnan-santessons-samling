<?php get_header(); ?>


  <!-- Förord -->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php require('templates/text.php'); ?>
  <?php endwhile; endif; wp_reset_query(); ?>


  <!-- Kapitel -->
  <?php
  $args = array(
    'post_type' => 'chapter',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'posts_per_page' => -1
  );
  $post_query = new WP_Query($args);

  if ($post_query->have_posts()) : while ($post_query->have_posts()) : $post_query->the_post();
    require('templates/chapter.php');
  endwhile; endif; ?>


  <!-- Om projektet -->
  <?php require_once('templates/about.php'); ?>


  <!-- Index -->
  <?php require_once('templates/index.php'); ?>


<?php get_footer(); ?>
