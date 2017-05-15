<section class="Section Section--black">
  <div class="Site-container Site-container--narrow">
    <?php if (get_sub_field('text_title')) { ?>
    <h1 class="Section-title"><?php the_sub_field('text_title'); ?></h1>
    <?php } ?>
    <div class="Type">
      <?php the_sub_field('text'); ?>
    </div>
  </div>
</section>
