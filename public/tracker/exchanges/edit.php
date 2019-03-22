<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/tracker/exchanges/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

    $exchange = [];
    $exchange['id'] = $id;
    $exchange['name'] = $_POST['name'] ?? '';
    $exchange['kyc'] = $_POST['kyc'] ?? '';
    $exchange['location'] = $_POST['location'] ?? '';
    $exchange['position'] = $_POST['position'] ?? '';
    $exchange['visible'] = $_POST['visible'] ?? '';

    $result = update_exchange($exchange);
    if($result === true) {
        redirect_to(url_for('/tracker/exchanges/show.php?id=' . $id));
    } else {
        $errors = $result;
        //var_dump($errors);
    }

} else {
    $exchange = find_exchange_by_id($id);
}

$exchange_set = find_all_exchanges();
$exchange_count = mysqli_num_rows($exchange_set);
mysqli_free_result($exchange_set);

?>

<?php $page_title = 'Edit Exchange'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/tracker/exchanges/index.php'); ?>">&laquo; Back to List</a>

  <div class="exchange edit">
    <h1>Edit Exchange</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/tracker/exchanges/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Name:</dt>
        <dd><input type="text" name="name" value="<?php echo h($exchange['name']); ?>" /></dd>
      </dl>
      <dl>
      <dl>
        <dt>KYC:</dt>
        <dd><input type="text" name="kyc" value="<?php echo h($exchange['kyc']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Location:</dt>
        <dd><input type="text" name="location" value="<?php echo h($exchange['location']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position:</dt>
        <dd>
          <select name="position">
                <?php
                for($i=1; $i <= $exchange_count; $i++) {
                    echo "<option value=\"{$i}\"";
                    if($page["position"] == $i) {
                    echo " selected";
                    }
                    echo ">{$i}</option>";
                }
                ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible:</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php if(($exchange['visible']) == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Exchange" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>
