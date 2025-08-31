<?php
include('db.php');

// PHPMailer দিয়ে ইমেইল পাঠানো
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// --------------------- admin login logic start ------------------------------------


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

// --------------------- admin login logic end ------------------------------------



// --------------------- service logic start ------------------------------------


// Add service  Logic
if (isset($_POST['service_add'])) {
  $service_title = $_POST['service_title'];
  $service_category = $_POST['service_category'];
  $service_description = mysqli_real_escape_string($mysqli, $_POST['service_description']);


  // Image upload
  $service_image = $_FILES['service_image']['name'];
  $tmpName = $_FILES['service_image']['tmp_name'];
  $folder  = 'service_image/' . $service_image;

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


// Update service  Logic

if (isset($_POST['udpate_service'])) {
  $service_update_id = $_POST['id'];

  $service_title = $_POST['service_title'];
  $service_category = $_POST['service_category'];
  $service_description = mysqli_real_escape_string($mysqli, $_POST['service_description']);


  $service_image = $_FILES['service_image']['name'];
  $old_image = $_POST['old_image'];

  if ($service_image != '') {
    $service_image = $_FILES['service_image']['name'];
  } else {
    $service_image = $old_image;
  }
  $tmpName = $_FILES['service_image']['tmp_name'];
  $folder = 'service_image/' . $service_image;


  $mysqli->query("UPDATE `service_table` SET `service_title` = '$service_title', `service_category` = '$service_category', `service_description` = '$service_description', `service_image` = '$service_image' WHERE id=$service_update_id");

  move_uploaded_file($tmpName, $folder);
  $_SESSION['message'] = "Service has been updated";
  $_SESSION['message_type'] = 'warning';
  header('location:services.php');
}


// Delete service  Logic

if (isset($_GET['service_update_id'])) {
  $id = $_GET['service_update_id'];

  $mysqli->query("DELETE FROM service_table WHERE id=$id");

  $_SESSION['message'] = "Service has been deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:services.php");
}


// --------------------- service logic end ------------------------------------





// --------------------- Testimonail logic start ------------------------------------

// Add testimonial  Logic
if (isset($_POST['add_testimonial'])) {
  $client_name = $_POST['client_name'];
  $client_designation = $_POST['client_designation'];
  $client_description = mysqli_real_escape_string($mysqli, $_POST['client_description']);


  // Image upload
  $client_picture = $_FILES['client_picture']['name'];
  $tmpName = $_FILES['client_picture']['tmp_name'];
  $folder  = 'client_picture/' . $client_picture;

  // Insert query
  $mysqli->query("INSERT INTO testimonials (client_name, client_designation, client_description,  client_picture) 
                  VALUES ('$client_name', '$client_designation', '$client_description',  '$client_picture')");

  // Move uploaded file
  move_uploaded_file($tmpName, $folder);

  // Flash message
  $_SESSION['message'] = "Testimonial has been added successfully!";
  $_SESSION['message_type'] = 'success';

  header("location:testimonial.php");
  exit();
}


// Update testimonial  Logic

if (isset($_POST['update_testimonial'])) {
  $testimonail_update_id = $_POST['id'];

  $client_name = $_POST['client_name'];
  $client_designation = $_POST['client_designation'];
  $client_description = mysqli_real_escape_string($mysqli, $_POST['client_description']);


  $client_picture = $_FILES['client_picture']['name'];
  $old_image = $_POST['old_image'];

  if ($client_picture != '') {
    $client_picture = $_FILES['client_picture']['name'];
  } else {
    $client_picture = $old_image;
  }
  $tmpName = $_FILES['client_picture']['tmp_name'];
  $folder = 'client_picture/' . $client_picture;


  $mysqli->query("UPDATE `testimonials` SET `client_name` = '$client_name', `client_designation` = '$client_designation', `client_description` = '$client_description', `client_picture` = '$client_picture' WHERE id=$testimonail_update_id");

  move_uploaded_file($tmpName, $folder);
  $_SESSION['message'] = "Testimonial has been updated";
  $_SESSION['message_type'] = 'warning';
  header('location:testimonial.php');
}


// Delete Testimonial  Logic

if (isset($_GET['testimonial_des_id'])) {
  $id = $_GET['testimonial_des_id'];

  $mysqli->query("DELETE FROM testimonials WHERE id=$id");

  $_SESSION['message'] = "Testimonial has been deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:testimonial.php");
}

// --------------------- Testimonail logic stendart ------------------------------------





// --------------------- blog logic start ------------------------------------

// Add blog  Logic
if (isset($_POST['blog_add'])) {
  $blog_title = $_POST['blog_title'];
  $blog_category = $_POST['blog_category'];
  $blog_author = mysqli_real_escape_string($mysqli, $_POST['blog_author']);
  $blog_description = mysqli_real_escape_string($mysqli, $_POST['blog_description']);
  $blog_publish_date = mysqli_real_escape_string($mysqli, $_POST['blog_publish_date']);


  // Image upload
  $blog_picture = $_FILES['blog_picture']['name'];
  $tmpName = $_FILES['blog_picture']['tmp_name'];
  $folder  = 'blog_picture/' . $blog_picture;

  // Insert query
  $mysqli->query("INSERT INTO blog_table (blog_title, blog_category, blog_author,  blog_description, blog_publish_date, blog_picture) 
                  VALUES ('$blog_title', '$blog_category', '$blog_author',  '$blog_description', '$blog_publish_date', '$blog_picture')");

  // Move uploaded file
  move_uploaded_file($tmpName, $folder);

  // Flash message
  $_SESSION['message'] = "Blog has been added successfully!";
  $_SESSION['message_type'] = 'success';

  header("location:blog.php");
  exit();
}


// Update blog  Logic

if (isset($_POST['update_blog'])) {
  $blog_update_id = $_POST['id'];

  $blog_title = $_POST['blog_title'];
  $blog_category = $_POST['blog_category'];
  $blog_author = mysqli_real_escape_string($mysqli, $_POST['blog_author']);
  $blog_description = mysqli_real_escape_string($mysqli, $_POST['blog_description']);
  $blog_publish_date = mysqli_real_escape_string($mysqli, $_POST['blog_publish_date']);


  $blog_picture = $_FILES['blog_picture']['name'];
  $old_image = $_POST['old_image'];

  if ($blog_picture != '') {
    $blog_picture = $_FILES['blog_picture']['name'];
  } else {
    $blog_picture = $old_image;
  }
  $tmpName = $_FILES['blog_picture']['tmp_name'];
  $folder = 'blog_picture/' . $blog_picture;


  $mysqli->query("UPDATE `blog_table` SET `blog_title` = '$blog_title', `blog_category` = '$blog_category', `blog_author` = '$blog_author', `blog_description` = '$blog_description', `blog_publish_date` = '$blog_publish_date', `blog_picture` = '$blog_picture' WHERE id=$blog_update_id");

  move_uploaded_file($tmpName, $folder);
  $_SESSION['message'] = "Blog has been updated";
  $_SESSION['message_type'] = 'warning';
  header('location:blog.php');
}


// Delete blog  Logic

if (isset($_GET['blog_delete_id'])) {
  $id = $_GET['blog_delete_id'];

  $mysqli->query("DELETE FROM blog_table WHERE id=$id");

  $_SESSION['message'] = "Blog has been deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:blog.php");
}

// --------------------- Testimonail logic stendart ------------------------------------
