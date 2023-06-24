<?php include "../../includes/db.php"; ?>
<?php include 'includes/admin-header.php'; ?>
<?php include 'includes/admin-navbar.php'; ?>

<?php $file_paths = get_media_path_list(); ?>

<section class="container col mt-5 ms-5">
  <a href="add-media.php" type="button" class="btn btn-primary">Upload Media</a>
  <div class="row mt-5">
    <?php
    if (!empty($file_paths)) {
      foreach ($file_paths as $index => $file_src) {
        echo '<div class="m-3" style="width: 200px; height: 200px; cursor: pointer; overflow: hidden;">
                <img src="/webProg1/COSC630/images/' . $file_src . '"
                  class="img-fluid modal-img rounded" id="img_' . $index . '" loading="lazy"
                  data-bs-toggle="modal" data-bs-target="#image-modal"
                />
              </div>';
      }
    } else {
      echo '<p>No images have been uploaded.</p>';
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="image-modal" tabindex="-1" aria-labelledby="image-modal-label" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="image-modal-label"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex justify-content-center m-3">
            <img src="" id="img-modal-image" class="img-fluid rounded" style="max-width: 100%;">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Attach click event listeners to each image in the gallery.
  var galleryImgs = document.querySelectorAll('.modal-img');
  var modalImg = document.getElementById('img-modal-image');
  var modalLabel = document.getElementById('image-modal-label');

  // On click, open image modal.
  galleryImgs.forEach(function(galImg) {
    galImg.addEventListener('click', function() {
      var srcPath = this.src;
      var imgPath = srcPath.split('/');
      modalLabel.innerHTML = imgPath[imgPath.length - 1];
      modalImg.src = srcPath;
    });
  });
</script>

<?php include 'includes/admin-footer.php'; ?>
