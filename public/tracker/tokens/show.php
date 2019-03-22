<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1';

$token = find_token_by_id($id);

?>


<?php $page_title = 'Show Tokens'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/tracker/tokens/index.php'); ?>">&laquo; Back to List</a>

  <div class="token show">

    <h1>Token: <?php echo h($token['token']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Token</dt>
        <dd><?php echo h($token['token']); ?></dd>
      </dl>
      <dl>
        <dt>Ticker</dt>
        <dd><?php echo h($token['ticker']); ?></dd>
      </dl>
      <dl>
        <dt>Quantity</dt>
        <dd><?php echo h($token['quantity']); ?></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd><?php echo h($token['position']); ?></dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd><?php echo $token['visible'] == '1' ? 'true' : 'false'; ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>