<?php
$images = get_sub_field('images');
if ($images) {
?>

<section class="Section Section--gray Section--images">
<?php if ($images) { foreach( $images as $image ) { ?>
  <?php if ($image['sizes']['large']) { ?>
  <img class="js-lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
  <?php } ?>
<?php } } ?>
</section>

<?php } ?>
