<?php 
require_once('../../private/initialize.php');

if(is_post_request()) {
  $sallyName = $_POST['Name'] ?? '';

  echo "Salamander Name: " . $sallyName;
} else {
  redirect_to(urlFor('/salamanders/new.php'));
}

print("<h1>This is a Stub for create.php</h1>");
?>
