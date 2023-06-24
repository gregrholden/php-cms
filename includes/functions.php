<?php

// Handle user registration.
function register($username, $password, $fname, $lname, $email) {
  global $db;
  // Scrub User Input.
  $username = mysqli_real_escape_string($db, $username);
  $password = mysqli_real_escape_string($db, $password);
  $fname    = mysqli_real_escape_string($db, $fname);
  $lname    = mysqli_real_escape_string($db, $lname);
  $email    = mysqli_real_escape_string($db, $email);
  // Check if username already exists.
  if (user_field_exists('username', $username)) {
    $_SESSION['reg_status'] = 0;
    $_SESSION['reg_msg'] = "Username already taken. Please choose a different username.";
    return false;
  }
  // Check if email already exists.
  elseif (user_field_exists('email', $email)) {
    $_SESSION['reg_status'] = 0;
    $_SESSION['reg_msg'] = "This email address already has an account. Please <a class='text-light' href='/webProg1/COSC630/login.php'>login</a> or reset your password.";
    return false;
  }
  // If neither exists and emails are properly structured, add user to database.
  else {
    // Hash password with built-in PHP hash function.
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    $stmt = $db->prepare(
      "INSERT INTO users (username,password,fname,lname,email) VALUES(?,?,?,?,?)"
    );
    $stmt->bind_param('sssss', $username, $password, $fname, $lname, $email);
    $stmt->execute();
    $stmt->close();
  }
  $_SESSION['reg_status'] = 1;
  $_SESSION['reg_msg'] = "Account created. Please <a class='text-light' href='/webProg1/COSC630/login.php'>login</a>.";
  return true;
}

// A replacement function to use if admin sets registration to "closed."
function register_closed($username, $password, $fname, $lname, $email) {
  $_SESSION['reg_status'] = 0;
  $_SESSION['reg_msg'] = "Sorry. Registration of new users is currently closed.\n" .
                         "Feel free to <a class='text-light' href='/webProg1/COSC630/index.php'>browse the site</a>.";
  return false;
}

// Handle user login.
function login($username, $password) {
  global $db;
  $db_uid = null;
  $db_username = null;
  $db_password = null;
  $db_fname = null;
  $db_lname = null;
  // Scrub User Input.
  $username = trim($username);
  $password = trim($password);
  $username = mysqli_real_escape_string($db, $username);
  $password = mysqli_real_escape_string($db, $password);
  // Use Prepared Statements to avoid injection.
  $stmt = $db->prepare('SELECT uid,username,password,fname,lname FROM users WHERE username = ?');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $stmt->bind_result($db_uid, $db_username, $db_password, $db_fname, $db_lname);
  $stmt->fetch();
  // If no results returned.
  if (!$db_uid) {
    $stmt->close();
    return false;
  }
    // Verify password and set $_SESSION values if a match.
  if (password_verify($password, $db_password)) {
    $_SESSION['uid'] = $db_uid;
    $_SESSION['username'] = $db_username;
    $_SESSION['fname'] = $db_fname;
    $_SESSION['lname'] = $db_lname;
    $stmt->close();
    redirect_to('/webProg1/COSC630/index.php');
  } else {
    $stmt->close();
    $_SESSION['login_err'] = "Incorrect username/password.\nPlease try again.";
    return false;
  }
  $stmt->close();
  return true;
}

///////////////////////
// UTILITY FUNCTIONS //
///////////////////////
function is_method($method = null) {
  if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
    return true;
  }
  return false;
}

function user_field_exists($field, $value) {
  global $db;
  $returned_value = null;
  $stmt = $db->prepare("SELECT ? FROM users WHERE ? = ?");
  $stmt->bind_param('sss', $field, $field, $value);
  $stmt->execute();
  $stmt->bind_result($returned_value);
  $stmt->fetch();
  if (!$returned_value) {
    return false;
  } else {
    return true;
  }
}

function is_logged_in() {
  if (isset($_SESSION['uid'])) {
    return true;
  }
  return false;
}

function redirect_to($location) {
  header("Location:" . $location);
  exit;
}

function if_logged_in_then_redirect_to($redirectLocation = null) {
  if (is_logged_in()) {
    redirect_to($redirectLocation);
  }
}

function get_media_path_list() {
  $path = "../images";
  $file_paths = array_diff(scandir($path), array('.', '..'));
  return $file_paths;
}

////////////////////////
// DATABASE FUNCTIONS //
////////////////////////

