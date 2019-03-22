<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/tracker/tokens/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_token($id);
  redirect_to(url_for('/tracker/tokens/index.php'));

} else {
  $token = find_token_by_id($id);
}

?>

<?php $page_title = 'Delete Token'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/tracker/tokens/index.php'); ?>">&laquo; Back to List</a>

  <div class="token delete">
    <h1>Delete Token</h1>
    <p>Are you sure you want to delete this token?</p>
    <p class="item"><?php echo h($token['token']); ?></p>

    <form action="<?php echo url_for('/tracker/tokens/delete.php?id=' . h(u($token['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Token" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>
