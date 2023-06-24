<?php include "../../includes/db.php"; ?>
<?php include 'includes/admin-header.php'; ?>
<?php include 'includes/admin-navbar.php'; ?>
<?php
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["media"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

echo exec('whoami');
var_dump($_FILES);

// Check if image file is a actual image or fake image.
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["media"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists.
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size.
if ($_FILES["media"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats.
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" && $imageFileType != "bmp"
) {
  echo "Sorry, only JPG/JPEG, PNG, GIF, and BMP files are allowed. File is " . $imageFileType;
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error.
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file.
} else {
  if (move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["media"]["name"])) . " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
<?php include 'includes/admin-footer.php'; ?>