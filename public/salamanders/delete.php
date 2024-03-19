<?php require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/salamanders/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $sallyName = $_POST['Name'] ?? '';

  echo "Salamander Name: " . $sallyName;
} 

$pageTitle = 'Delete Salamander';
include(SHARED_PATH . '/salamander-header.php');
?>

<a href="<?= urlFor('/salamanders/index.php'); ?>">&laquo; Back to list</a>

<h1>This is a Stub for Delete Salamander</h1>
<!-- <form action="<?= urlFor('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="sallyName">Name</label><br>
  <input type="text" id="sallyName" name="Name"><br>

  <input type="submit" value="Edit Salamander">
</form> -->

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>