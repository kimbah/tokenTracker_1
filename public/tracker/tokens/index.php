<?php require_once('../../../private/initialize.php'); ?>

<?php

    $token_set = find_all_tokens();

?>

<?php $page_title = 'Tokens'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">
  <div class="tokens listing">
    <h1>Tokens</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/tracker/tokens/new.php'); ?>">Create New Token</a>
    </div>

    <table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>Ticker</th>
        <th>Quantity</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
  	  </tr>

      <?php while ($token = mysqli_fetch_assoc($token_set)) { ?>
        <tr>
          <td><?php echo h($token['id']); ?></td>
          <td><?php echo h($token['position']); ?></td>
          <td><?php echo $token['visible'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo h($token['token']); ?></td>
          <td><?php echo h($token['ticker']); ?></td>
          <td><?php echo h($token['quantity']); ?></td>
          <td><a class="action" href="<?php echo url_for('/tracker/tokens/show.php?id=' . h(u($token['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/tracker/tokens/edit.php?id=' . h(u($token['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/tracker/tokens/delete.php?id=' . h(u($token['id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
        mysqli_free_result($token_set);
    ?>

  </div>
</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>