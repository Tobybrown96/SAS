<?php require_once('../../private/initialize.php'); 

$id = $_GET['id'] ?? '1';

$sally = find_sally_by_id($id);

$pageTitle = 'Salamander Details';

include(SHARED_PATH . '/salamander-header.php');
?>

<div class="show">
  <h1>Salamander: <?php echo h($sally['name']); ?></h1>
  <div class="attributes">
    <dl>
      <dt><b>ID:</b></dt>
      <dd><?php echo h($sally['id']); ?></dd><br>

      <dt><b>Name:</b></dt>
      <dd><?php echo h($sally['name']); ?></dd><br>

      <dt><b>Habitat:</b></dt>
      <dd><?php echo h($sally['habitat']); ?></dd><br>

      <dt><b>Description:</b></dt>
      <dd><?php echo h($sally['description']); ?></dd><br>
    </dl>
  </div>
</div>

<p><a href="<?php echo urlFor('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
