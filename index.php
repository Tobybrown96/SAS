<?php 
  require_once('private/initialize.php');
  //header('Location: public/');
  $page_title = 'Home';
  //include(SHARED_PATH . '/salamander-header.php');?>

  <h1>Southern Appalachian Salamanders</h1>
  <p>This is the home page for Southern Appalachian Salamanders.</p>

  <ul>
    <li><a href="<?php echo urlFor('../public/index.php'); ?>">SAS</a></li>
  </ul>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
