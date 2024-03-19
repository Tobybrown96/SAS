<!-- require initialize.php -->
<?php require_once('../../private/initialize.php'); 

$sally_set = find_all_sally();

//Add the pageTitle for salamanders
//Include a shared path to the salamander header
$pageTitle = 'Salamanders';
include(SHARED_PATH . '/salamander-header.php');
?>

<h1>Salamanders</h1>

  <a href="<?php echo urlFor('/salamanders/new.php'); ?>">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Description</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php while($sally = mysqli_fetch_assoc($sally_set)) { ?>
    <!-- <td>Display the salamander id</td> -->
    <!-- <td>Display the salamander name</td> -->
    <!-- Use url_for with show.php AND h(u) with the salamander['id'] -->
    <tr>
      <td><?php echo h($sally['id']); ?></td>
      <td><?php echo h($sally['name']); ?></td>
      <td><?php echo h($sally['habitat']); ?></td>
      <td><?php echo h($sally['description']); ?></td>
      <td><a href="<?php echo urlFor('salamanders/show.php?id='. h(u($sally['id']))); ?>">View</a></td>
      <td><a href="<?php echo urlFor('salamanders/edit.php?id='. h(u($sally['id']))); ?>">Edit</a></td>
      <td><a href="<?php echo urlFor('salamanders/delete.php?id='. h(u($sally['id']))); ?>">Delete</a></td>
    </tr>
  <?php } ?>
</table>

<?php
  mysqli_free_result($sally_set);

  include(SHARED_PATH . '/salamander-footer.php');
?>
