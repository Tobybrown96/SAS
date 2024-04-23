<?php require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/salamanders/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $sally = [];
  $sally['id'] = $id;
  $sally['name'] = $_POST['name'] ?? '';
  $sally['habitat'] = $_POST['habitat'] ?? '';
  $sally['description'] = $_POST['description'] ?? '';

  $result = update_sally($sally);
  if($result === true) {
    redirect_to(urlFor('/salamanders/show.php?id=' . $id));
  } else {
    $errors = $result;
    //var_dump($errors);
  }

} else {
  $sally = find_sally_by_id($id);
}

$pageTitle = 'Edit Salamander';
include(SHARED_PATH . '/salamander-header.php');
?>

<a href="<?= urlFor('/salamanders/index.php'); ?>">&laquo; Back to list</a>

<h1>Edit Salamander</h1>

<?php echo display_errors($errors); ?>

<form action="<?= urlFor('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="name">Name</label><br>
  <input type="text" id="name" name="name" value="<?php echo h($sally['name']); ?>"><br>

  <label for="habitat">Habitat:</label><br>
  <textarea id="habitat" rows="4" cols="50" name="habitat"><?php echo h($sally['habitat']); ?></textarea><br>

  <label for="description">Description:</label><br>
  <textarea id="description" rows="4" cols="50" name="description"><?php echo h($sally['description']); ?></textarea><br>

  <input type="submit" value="Edit Salamander">
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
