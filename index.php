<?php 
  require_once('private/initialize.php');
  //header('Location: public/');
  $page_title = 'Home';
  //include(SHARED_PATH . '/salamander-header.php');?>
<?php
  if(!isset($pageTitle)) { 
    $pageTitle = 'Salamanders'; 
  }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>SAS - <?php echo h($pageTitle); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>" />
  </head>

  <body>
    <h1>Southern Appalachian Salamanders</h1>
    <p>This is the home page for Southern Appalachian Salamanders.</p>

    <ul>
      <li><a href="<?php echo urlFor('../public/index.php'); ?>">SAS</a></li>
    </ul>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
