<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate CAPTCHA
  if (isset($_POST["captcha"]) && $_POST["captcha"] === $_SESSION["captcha"]) {
    // CAPTCHA validation successful
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // TODO: Process the form data (e.g., send an email, store in a database, etc.)

    // Reset CAPTCHA
    unset($_SESSION["captcha"]);

    echo "Form submitted successfully!";
  } else {
    // CAPTCHA validation failed
    echo "CAPTCHA verification failed!";
  }
} else {
  // Redirect to the contact form page if accessed directly
  header("Location: index.html");
  exit();
}
?>
