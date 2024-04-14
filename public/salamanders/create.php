<?php 
require_once('../../private/initialize.php');

if(is_post_request()) {
  $name = $_POST['name'] ?? '';
  $habitat = $_POST['habitat'] ?? '';
  $description = $_POST['description'] ?? '';

  $result = insert_sally($name, $habitat, $description);
  $new_id = mysqli_insert_id($db);
  redirect_to(urlFor('/salamanders/show.php?id=' . $new_id));

} else {
  redirect_to(urlFor('/salamanders/new.php'));
}

?>
