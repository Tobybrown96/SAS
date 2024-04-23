<?php require_once('../../private/initialize.php');

//$test = $_GET['test'] ?? '';

// if($test == '404') {
//   error_404();
// } elseif($test == '500') {
//   error_500();
// } elseif($test == 'redirect') {
//   Redirect_to(urlFor('/salamanders/index.php'));
// }
if(is_post_request()) {
  $sally = [];
  $sally['name'] = $_POST['name'] ?? '';
  $sally['habitat'] = $_POST['habitat'] ?? '';
  $sally['description'] = $_POST['description'] ?? '';

  $result = insert_sally($sally);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(urlFor('/salamanders/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }
  
} else {
  // display the blank form
}

$pageTitle = 'New Salamander';
include(SHARED_PATH . '/salamander-header.php');
?>

<a href="<?php echo urlFor('/salamanders/index.php'); ?>">&laquo; Back to list</a>

<h1>Create Salamander</h1>

<?php echo display_errors($errors); ?>

<form action="<?= urlFor('/salamanders/new.php'); ?>" method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>

  <label for="habitat">Habitat:</label><br>
  <textarea id="habitat" rows="4" cols="50" name="habitat"></textarea><br>

  <label for="description">Description:</label><br>
  <textarea id="description" rows="4" cols="50" name="description"></textarea><br>

  <input type="submit" value="Create Salamander">
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
