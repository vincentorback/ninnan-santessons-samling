<?php
$afterwords_page = get_page_by_title('Efterord');
if ($afterwords_page) {
  $pagination = get_field('pagination', $afterwords_page->ID);
?>
<div class="Page Page--white">
  <?php if ($pagination) { ?>
  <span class="Page-pagination">
    <span class="Page-paginationInner"><?php echo $pagination; ?></span>
  </span>
  <?php } ?>
  <section class="Section Section--text" id="efterord">
    <div class="Site-container Site-container--narrow">
      <h1 class="Section-title">Efterord</h1>
      <div class="Type">
        <?php echo apply_filters('the_content', $afterwords_page->post_content); ?>
      </div>
    </div>
  </section>
</div>
<?php } ?>
