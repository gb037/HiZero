<!-- page purpose - readers listing -->

<!-- loads core resources -->
<?php require_once('../../../private/initialize.php'); ?>

<?php
  # lists all readers
  $reader_set = find_all_readers();

?>

<!-- sets page title -->
<?php $page_title = 'Readers'; ?>
<!-- includes header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <div class="readers listing">
        <h1>Readers</h1>

        <table class="list">

        <tr>
            <th>Name</th>
        </tr>
        <!-- while there's a reader result to load, load it -->
        <?php while($reader = mysqli_fetch_assoc($reader_set)) { ?>
            <tr>
            <!-- displays reader name and links to reader page, passing reader id to it -->
            <td><a class="action" href="<?php echo url_for('/all/readers/show.php?id=' . h(u($reader['id']))); 
            ?>"><?php echo h($reader['name']); ?></a></td>
            </tr>
        <?php } ?>
        </table>
        
        <!-- drops reader set object -->
        <?php
          mysqli_free_result($reader_set);
        ?>

  </div>
</div>

<!-- includes footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>