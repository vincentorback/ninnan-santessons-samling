<?php
$afterwords_page = get_page_by_title('Efterord');
if ($afterwords_page) {
?>
<section class="Section Section--text">
  <div class="Site-container Site-container--narrow">
    <h1 class="Section-title">Efterord</h1>
    <div class="Type">
      <?php echo apply_filters('the_content', $afterwords_page->post_content); ?>
    </div>
  </div>
</section>
<?php } ?>
