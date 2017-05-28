<?php
$afterwords_page = getCustomPage('Efterord');
if ($afterwords_page) {
  $pagination = get_field('pagination', $afterwords_page->ID);
?>
<div class="Page Page--white">

  <?php if ($pagination) { ?>
  <span class="Page-pagination">
    <span class="Page-paginationInner"><?php echo $pagination; ?></span>
  </span>
  <?php } ?>

  <section class="Section Section--text" id="<?php echo $afterwords_page->post_name; ?>">
    <div class="Site-container Site-container--narrow">
      <h1 class="Section-title">
        <a class="Section-titleLink" href="#<?php echo $afterwords_page->post_name; ?>"><?php echo $afterwords_page->post_title; ?></a>
      </h1>
      <div class="Type">
        <?php echo apply_filters('the_content', $afterwords_page->post_content); ?>
      </div>
    </div>
  </section>

</div>
<?php } ?>
