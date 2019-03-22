<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$exchange = find_exchange_by_id($id);
?>


<?php $page_title = 'Show Exchanges'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/tracker/exchanges/index.php'); ?>">&laquo; Back to List</a>

  <div class="exchange show">
    <h1>Exchange: <?php echo h($exchange['name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Exchange</dt>
        <dd><?php echo h($exchange['name']); ?></dd>
      </dl>
      <dl>
        <dt>KYC</dt>
        <dd><?php echo h($exchange['kyc']); ?></dd>
      </dl>
      <dl>
        <dt>Location</dt>
        <dd><?php echo h($exchange['location']); ?></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd><?php echo h($exchange['position']); ?></dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd><?php echo $exchange['visible'] == '1' ? 'true' : 'false'; ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>
