<?php include "../../includes/db.php"; ?>
<?php include 'includes/admin-header.php'; ?>
<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
<style>
  .tox-promotion,
  .tox-statusbar__branding {
    visibility: hidden;
    display: none;
  }
</style>
<?php include 'includes/admin-navbar.php'; ?>

<section class="container col mt-2 ms-5">
  <div class="row mt-5">
    <h2>Add a New Post</h2>
    <p><?php echo __DIR__; ?></p>
    <p>&nbsp;</p>
    <form action="../handlers/save-post.php" method="POST">
      <input class="form-control mb-2" type="text" placeholder="Enter a title" name="tinymce-title" required />
      <textarea id="tinymce" name="tinymce-content"></textarea>
      <input type="submit" class="btn btn-primary btn-lg mt-3" value="Publish" />
    </form>
  </div>
</section>

<script type="text/javascript">
  tinymce.init({
    selector: 'textarea#tinymce',
    height: 600,
    plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
      'insertdatetime', 'media', 'table', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
      'bold italic backcolor | alignleft aligncenter ' +
      'alignright alignjustify | bullist numlist outdent indent | ' +
      'removeformat',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:1rem }'
  });
</script>
<?php include 'includes/admin-footer.php'; ?>
