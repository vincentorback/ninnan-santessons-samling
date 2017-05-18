<?php
$forewords_page = getCustomPage('Förord');
if ($forewords_page) {
  $pagination = get_field('pagination', $forewords_page->ID);
?>
<div class="Page Page--white">

  <?php if ($pagination) { ?>
  <span class="Page-pagination">
    <span class="Page-paginationInner"><?php echo $pagination; ?></span>
  </span>
  <?php } ?>

  <section class="Section Section--text" id="forord">
    <div class="Site-container Site-container--narrow">
      <h1 class="Section-title">Förord</h1>
      <div class="Type">
        <?php echo apply_filters('the_content', $forewords_page->post_content); ?>
      </div>
    </div>
  </section>

</div>
<?php } ?>
