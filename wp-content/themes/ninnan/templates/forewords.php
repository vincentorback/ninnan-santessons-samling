<?php
$forewords_page = get_page_by_title('Förord');
if ($forewords_page) {
?>
<section class="Section Section--text" id="forord">
  <div class="Site-container Site-container--narrow">
    <h1 class="Section-title">Förord</h1>
    <div class="Type">
      <?php echo apply_filters('the_content', $forewords_page->post_content); ?>
    </div>
  </div>
</section>
<?php } ?>
