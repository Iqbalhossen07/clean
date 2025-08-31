<?php
include('db.php');

// PHPMailer দিয়ে ইমেইল পাঠানো
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// admin  logic

if (isset($_POST['adminlogin'])) {


  $email = $_POST['email'];
  $password = $_POST['password'];

  // ডাটাবেজ থেকে ইউজারের তথ্য যাচাই
  $login_query = "SELECT * FROM `admin_table` WHERE email = '$email'";
  $login_run = mysqli_query($mysqli, $login_query);

  if (mysqli_num_rows($login_run) > 0) {
    $login_row = mysqli_fetch_array($login_run);

    // ডাটাবেজ থেকে পাওয়া পাসওয়ার্ড ও অন্যান্য তথ্য
    $db_pass = $login_row['password'];
    $user_id = $login_row['id'];
    $user_type = $login_row['user_type'];

    // পাসওয়ার্ড ভেরিফিকেশন
    if ($password == $db_pass) {
      // সেশন সেট করা
      $_SESSION['email'] = $email;
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_type'] = $user_type;

      // user_type অনুসারে রিডিরেক্ট
      if ($user_type == 'applicant') {
        header('Location: ../index.php');
        exit();
      } elseif ($user_type == 'admin' || $user_type == 'lawyer') {
        header('Location: index.php');
        exit();
      }
    } else {
      // পাসওয়ার্ড ভুল হলে এরর মেসেজ সেট করে লগইন পেজে পাঠানো
      $_SESSION['error'] = "Incorrect password!";
      header('Location: login.php');
      exit();
    }
  } else {
    // ইমেইল না থাকলে এরর মেসেজ সেট করে লগইন পেজে পাঠানো
    $_SESSION['error'] = "Email not found!";
    header('Location: login.php');
    exit();
  }
}



// Add Blog  Logic
if (isset($_POST['service_add'])) {
  $service_title = $_POST['service_title'];
  $service_category = $_POST['service_category'];
  $service_description = mysqli_real_escape_string($mysqli, $_POST['service_description']);


  // Image upload
  $service_image = $_FILES['service_image']['name'];
  $tmpName = $_FILES['service_image']['tmp_name'];
  $folder  = 'blogImage/' . $service_image;

  // Insert query
  $mysqli->query("INSERT INTO service_table (service_title, service_category, service_description,  service_image) 
                  VALUES ('$service_title', '$service_category', '$service_description',  '$service_image')");

  // Move uploaded file
  move_uploaded_file($tmpName, $folder);

  // Flash message
  $_SESSION['message'] = "Service has been added successfully!";
  $_SESSION['message_type'] = 'success';

  header("location:services.php");
  exit();
}
