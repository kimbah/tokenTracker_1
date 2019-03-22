<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/tracker/tokens/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {
    
    // Handle form values sent by new.php

    $token = [];
    $token['id'] = $id;
    $token['token'] = $_POST['token'] ?? '';
    $token['ticker'] = $_POST['ticker'] ?? '';
    $token['quantity'] = $_POST['quantity'] ?? '';
    $token['position'] = $_POST['position'] ?? '';
    $token['visible'] = $_POST['visible'] ?? '';

    $result = update_token($token);
    if($result === true) {
        redirect_to(url_for('/tracker/tokens/show.php?id=' . $id));
    } else {
        $errors = $result;
        //var_dump($errors);
    }
    
} else {
    
    $token = find_token_by_id($id);
}

$token_set = find_all_tokens();
$token_count = mysqli_num_rows($token_set);
mysqli_free_result($token_set);

?>

<?php $page_title = 'Edit Token'; ?>
<?php include(SHARED_PATH . '/tracker_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/tracker/tokens/index.php'); ?>">&laquo; Back to List</a>

  <div class="token edit">
    <h1>Edit Token</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/tracker/tokens/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Name:</dt>
        <dd><input type="text" name="token" value="<?php echo h($token['token']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Ticker:</dt>
        <dd><input type="text" name="ticker" value="<?php echo h($token['ticker']); ?>" /></dd>
      </dl>
      </dl>
        <dt>Quantity:</dt>
        <dd><input type="number" name="quantity" value="<?php echo h($token['quantity']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position:</dt>
        <dd>
          <select name="position">
                <?php
                for($i=1; $i <= $token_count; $i++) {
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
          <input type="checkbox" name="visible" value="1"<?php if(($token['visible']) == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Token" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/tracker_footer.php'); ?>
