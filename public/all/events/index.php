<?php require_once('../../../private/initialize.php'); ?>


  

<?php $page_title = 'Events'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <div class="events listing">
      <h1>Events</h1>

      <?php
        for ($year = 2020; $year >= 2011; $year--) {
        $event_set = find_all_events($year); ?>
      
        <?php while($event = mysqli_fetch_assoc($event_set)) { ?>
          <h2><?php echo year(h($event['date'])); ?>
          <table class="list">
            <tr>
            <td height="150" width="150"><a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
            ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
            ?>.jpg" alt="Smiley face" height="150" width="150"></a></td>
            <td height="150" width="150">
              <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              <?php } ?>
            </td>
            <td height="150" width="150">
              <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              <?php } ?>
            </td>
            <td height="150" width="150">
              <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              <?php } ?>
            </td>
            <td height="150" width="150">
              <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              <?php } ?>
            </td>
            </tr>
            <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
              <tr>
              <td height="150" width="150">
                  
                    <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                    ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                    ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              </td>
              <td height="150" width="150">
                <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                  <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                  ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                  ?>.jpg" alt="Smiley face" height="150" width="150"></a>
                <?php } ?>
              </td>
              <td height="150" width="150">
                <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                  <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                  ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                  ?>.jpg" alt="Smiley face" height="150" width="150"></a>
                <?php } ?>
              </td>
              <td height="150" width="150">
                <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                  <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                  ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                  ?>.jpg" alt="Smiley face" height="150" width="150"></a>
                <?php } ?>
              </td>
              <td height="150" width="150">
                <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                  <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                  ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                  ?>.jpg" alt="Smiley face" height="150" width="150"></a>
                <?php } ?>
              </td>
              </tr>
            <?php } ?>
        </table>
        </h2>
        <?php } ?>
        
        
        <?php
          mysqli_free_result($event_set);
        ?>
      <?php } ?>
    </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
