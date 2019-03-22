<?php require_once('../../../private/initialize.php'); ?>

<?php

    $exchange_set = find_all_exchanges();

?>

<?php $page_title = 'Exchanges'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">
  <div class="exchanges listing">
    <h1>Exchanges</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/tracker/exchanges/new.php'); ?>">Create New Exchange</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>KYC</th>
  	    <th>Location</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($exchange = mysqli_fetch_assoc($exchange_set)) { ?>
        <tr>
          <td><?php echo h($exchange['id']); ?></td>
          <td><?php echo h($exchange['position']); ?></td>
          <td><?php echo $exchange['visible'] == 1 ? 'true' : 'false'; ?></td>
    	  <td><?php echo h($exchange['name']); ?></td>
    	  <td><?php echo h($exchange['kyc'] == 1 ? 'Yes' : 'No'); ?></td>
          <td><?php echo h($exchange['location']); ?></td>
          <td><a class="action" href="<?php echo url_for('/tracker/exchanges/show.php?id=' . h(u($exchange['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/tracker/exchanges/edit.php?id=' . h(u($exchange['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/tracker/exchanges/delete.php?id=' . h(u($exchange['id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    
    <?php mysqli_free_result($exchange_set); ?>

  </div>

</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>
