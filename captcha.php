<?php
session_start();

// Generate random CAPTCHA code
$captcha = generateCaptcha();
$_SESSION["captcha"] = $captcha;

// Create an image with the CAPTCHA code
$image = imagecreate(100, 30);
$bgColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 10, 5, $captcha, $textColor);

// Set the content type header to display the image
header("Content-type: image/png");

// Output the image as PNG
imagepng($image);

// Clean up
imagedestroy($image);

// Function to generate a random CAPTCHA code
function generateCaptcha($length = 5) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $captcha = '';
  $characterCount = strlen($characters);

  for ($i = 0; $i < $length; $i++) {
    $captcha .= $characters[rand(0, $characterCount - 1)];
  }

  return $captcha;
}
?>
