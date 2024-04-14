<?php require_once('../../private/initialize.php');

$test = $_GET['test'] ?? '';

if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
} elseif($test == 'redirect') {
  Redirect_to(urlFor('/salamanders/index.php'));
}

$pageTitle = 'New Salamander';
include(SHARED_PATH . '/salamander-header.php');
?>

<a href="<?php echo urlFor('/salamanders/index.php'); ?>">&laquo; Back to list</a>

<h1>Create Salamander</h1>
<form action="<?= urlFor('/salamanders/create.php'); ?>" method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>

  <label for="habitat">Habitat:</label><br>
  <textarea id="habitat" rows="4" cols="50" name="habitat"></textarea><br>

  <label for="description">Description:</label><br>
  <textarea id="description" rows="4" cols="50" name="description"></textarea><br>

  <input type="submit" value="Create Salamander">
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
