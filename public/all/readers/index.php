<?php require_once('../../../private/initialize.php'); ?>

<?php

  $reader_set = find_all_readers();

?>

<?php $page_title = 'Readers'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <div class="readers listing">
        <h1>Readers</h1>

        <table class="list">

        <tr>
            <th>Name</th>
        </tr>

        <?php while($reader = mysqli_fetch_assoc($reader_set)) { ?>
            <tr>
            <td><a class="action" href="<?php echo url_for('/all/readers/show.php?id=' . h(u($reader['id']))); 
            ?>"><?php echo h($reader['name']); ?></a></td>
            </tr>
        <?php } ?>
        </table>
        
        <?php
          mysqli_free_result($reader_set);
        ?>

  </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>