<!-- require initialize.php -->
<?php require_once('../../private/initialize.php'); ?>

<!-- 
  Write a salamanders array with the following
id=1, salamanderName = Red-Legged Salamander
id=2, salamanderName = Pigeon Mountain Salamander
id=3', salamanderName = ZigZag Salamander
id=4,  salamanderName= Slimy Salamander 
-->
<?php
$sallys = [
  ['id'=>'1', 'name'=>'Red-Legged Salamander'],
  ['id'=>'2', 'name'=>'Pigeon Mountain Salamander'],
  ['id'=>'3', 'name'=>'ZigZag Salamander'],
  ['id'=>'4', 'name'=>'Slimy Salamander'],
];

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
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php foreach($sallys as $sally) { ?>
    <!-- <td>Display the salamander id</td> -->
    <!-- <td>Display the salamander name</td> -->
    <!-- Use url_for with show.php AND h(u) with the salamander['id'] -->
    <tr>
      <td><?php echo h($sally['id']); ?></td>
      <td><?php echo h($sally['name']); ?></td>
      <td><a href="<?php echo urlFor('salamanders/show.php?id='. h(u($sally['id']))); ?>">View</a></td>
      <td><a href="<?php echo urlFor('salamanders/edit.php?id='. h(u($sally['id']))); ?>">Edit</a></td>
      <td><a href="#">Delete</a></td>
    </tr>
  <?php } ?>
</table>

<!-- add the shared path to the salamander footer -->
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
