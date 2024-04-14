<?php require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {

  redirect_to(urlFor('/salamanders/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  
  $result = delete_sally($id);
  redirect_to(urlFor('/salamanders/index.php'));

} else {
  $sally = find_sally_by_id($id);

}

$pageTitle = 'Delete Salamander';
include(SHARED_PATH . '/salamander-header.php');
?>

<a href="<?= urlFor('/salamanders/index.php'); ?>">&laquo; Back to list</a>

<h1>Delete Salamander</h1>
  <p>Are you sure you want to delete this salamander?</p>
  <p><?php echo h($sally['name']); ?></p>
  
  <form action="<?php echo urlFor('salamanders/delete.php?id=' . h(u($sally['id']))); ?>" method="post">
    <input type="submit" name="commit" value="Delete Salamander">
  </form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>