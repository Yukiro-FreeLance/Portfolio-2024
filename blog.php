<div class="container-fluid">
  <div class="row p-30-0">
    <div class="col-lg-12">
      <div class="art-section-title">
        <div class="art-title-frame">
          <h4>My Artworks</h4>
        </div>
      </div>
    </div>

    <?php
    $folder_path = 'img/works/thumbnail/';
    $images = glob($folder_path . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    $image_count = 0;
    foreach ($images as $image) {
      $thumbnail = 'img/works/thumbnail/' . basename($image);
      $original = $image;
      $title = basename($image);
      $description = "Project Description"; // You can customize this
    ?>
      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="art-grid art-grid-3-col art-gallery">
          <div class="art-grid-item webTemplates">
            <a data-fancybox="gallery" href="#" class="art-a art-portfolio-item-frame art-horizontal">
              <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>" />
              <span class="art-item-hover"><i class="fas fa-expand"></i></span>
            </a>

            <div class="art-item-description">
              <a href="#">
                <h5 class="mb-15"><?php echo $title; ?></h5>
              </a>

              <div class="mb-15"><?php echo $description; ?></div>

              <a href="#." class="art-link art-color-link art-w-chevron">Read more</a>
            </div>
          </div>
        </div>
      </div>

    <?php
      $image_count++;
      if ($image_count % 4 == 0) {
        echo '</div><div class="row p-30-0">';
      }
    }
    ?>
  </div>
</div>
