<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

    // Handle form values sent by new.php

    $exchange = [];
    $exchange['name'] = $_POST['name'] ?? '';
    $exchange['kyc'] = $_POST['kyc'] ?? '';
    $exchange['location'] = $_POST['location'] ?? '';
    $exchange['position'] = $_POST['position'] ?? '';
    $exchange['visible'] = $_POST['visible'] ?? '';

    $result = insert_exchange($exchange);
    if($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/tracker/exchanges/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }

} else {
    // display the blank form
    $exchange = [];
    $exchange['name'] = '';
    $exchange['kyc'] = '';
    $exchange['location'] = '';
    $exchange['position'] = '';
    $exchange['visible'] = '';
}

$exchange_set = find_all_exchanges();
$exchange_count = mysqli_num_rows($exchange_set) + 1;
mysqli_free_result($exchange_set);

?>

<?php $page_title = 'Create Exchange'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/tracker/exchanges/index.php'); ?>">&laquo; Back to List</a>

  <div class="exchange new">
    <h1>Create Exchange</h1>

    <?php echo display_errors($errors) ?>

    <form action="<?php echo url_for('/tracker/exchanges/new.php'); ?>" method="post">
      <dl>
        <dt>Exchange Name</dt>
        <dd><input type="text" name="name" value="<?php echo $exchange['name']; ?>" /></dd>
      </dl>
            <dl>
        <dt>Location</dt>
        <dd><input type="text" name="location" value="<?php echo $exhange['location']; ?>" /></dd>
      </dl>
      <dl>
      <dt>KYC</dt>
        <dd>
          <input type="hidden" name="kyc" value="0" />
          <input type="checkbox" name="kyc" value="1"<?php if($exchange['kyc'] == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
              for($i=1; $i <= $exchange_count; $i++) {
                echo "<option value=\"{$i}\"";
                if($page['position'] == $i) {
                  echo " selected";
                }
                echo ">{$i}</option>";
              }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
      <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php if($visible == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Exchange" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>
