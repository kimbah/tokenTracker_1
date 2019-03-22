<?php 
    if(!isset($page_title)) { $page_title = 'Tracker Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Tokens - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/style.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/tracker.css'); ?>" />

  <body>
    <header>
      <h1>Token and Exchange Tracker</h1>
    </header>

    <nav>
      <ul>
          <li><a href="<?php echo url_for('/tracker/index.php'); ?>">Menu</a></li>
          <li><a href="<?php echo url_for('index.php'); ?>">Home</a></li>
      </ul>
    </nav>