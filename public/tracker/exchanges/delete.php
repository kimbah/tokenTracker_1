<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/tracker/exchanges/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_exchange($id);
  redirect_to(url_for('/tracker/exchanges/index.php'));

} else {
  $exchange = find_exchange_by_id($id);
}

?>

<?php $page_title = 'Delete Exchange'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/tracker/exchanges/index.php'); ?>">&laquo; Back to List</a>

  <div class="exchange delete">
    <h1>Delete Exchange</h1>
    <p>Are you sure you want to delete this exchange?</p>
    <p class="item"><?php echo h($exchange['name']); ?></p>

    <form action="<?php echo url_for('/tracker/exchanges/delete.php?id=' . h(u($exchange['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Exchange" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>
