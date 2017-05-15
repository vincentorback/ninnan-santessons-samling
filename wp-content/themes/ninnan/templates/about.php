<section class="Section--gray Section--about" id="about">
  <div class="Grid Grid--equalHeight">
    <div class="Grid-cell u-md-size2of3">
      <div class="Section">
        <div class="Site-container">
          <h1 class="Section-title">Om projektet</h1>
          <div class="Type">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt doloremque fugiat quam earum error velit autem quae, minus quas dicta magnam repudiandae. Placeat consectetur quibusdam veritatis, omnis, sunt rem quae asperiores libero cumque, aliquid fugit molestiae, explicabo eos tenetur. Quasi explicabo nihil excepturi nam, consequuntur, sequi corporis ex sunt modi.</p>
          </div>
          <?php
          $slideshow_id = uniqid();
          ?>
          <br><br>
          <figure class="Slideshow js-slideshow" id="<?php echo $slideshow_id; ?>" data-slides="3" data-loaded="0">
            <div class="Slideshow-item dragend-page">
              <img
              class="Slideshow-itemImage js-lazy"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
              data-src="http://placehold.it/500x500"
              data-slideshow="<?php echo $slideshow_id; ?>">
            </div>
            <div class="Slideshow-item dragend-page">
              <img
              class="Slideshow-itemImage js-lazy"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
              data-src="http://placehold.it/500x500"
              data-slideshow="<?php echo $slideshow_id; ?>">
            </div>
            <div class="Slideshow-item dragend-page">
              <img
              class="Slideshow-itemImage js-lazy"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
              data-src="http://placehold.it/500x500"
              data-slideshow="<?php echo $slideshow_id; ?>">
            </div>
          </figure>
        </div>
      </div>
    </div>
    <div class="Grid-cell u-md-size1of3">
      <div class="Section">
        <div class="Site-container">
          <div class="Type">
            <h1>Tack till</h1>

            <p>©2017 <br>Beckmans Designhögskola</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
