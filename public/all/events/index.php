<!-- page purpose - events listing -->

<!-- loads core resources -->
<?php require_once('../../../private/initialize.php'); ?>

<!-- sets page title -->
<?php $page_title = 'Events'; ?>
<!-- includes header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <div class="events listing">
      <h1>Events</h1>

      <?php
        # loops through year range to load events per year
        for ($year = 2020; $year >= 2011; $year--) {
        # loads in set of events for one year
        $event_set = find_all_events($year); ?>
        <!-- while there is an event record to load in, load it -->
        <?php while($event = mysqli_fetch_assoc($event_set)) { ?>
          <!-- displays year -->
          <h2><?php echo year(h($event['date'])); ?>
          <table class="list">
            <tr>
            <!-- display event poster thumbnail and link to the event page, passing the event id to it -->
            <td height="150" width="150"><a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
            ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
            ?>.jpg" alt="Smiley face" height="150" width="150"></a></td>
            <!-- if there is another event, displays next event poster thumbnail, etc -->
            <td height="150" width="150">
              <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              <?php } ?>
            </td>
            <!-- if there is another event, displays next event poster thumbnail, etc -->
            <td height="150" width="150">
              <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              <?php } ?>
            </td>
            <!-- if there is another event, displays next event poster thumbnail, etc -->
            <td height="150" width="150">
              <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              <?php } ?>
            </td>
            <!-- if there is another event, displays next event poster thumbnail, etc -->
            <td height="150" width="150">
              <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              <?php } ?>
            </td>
            </tr>
            <!-- if there is another event, displays next row of event poster thumbnails, etc -->
            <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
              <tr>
              <td height="150" width="150">  
                    <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                    ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                    ?>.jpg" alt="Smiley face" height="150" width="150"></a>
              </td>
              <!-- if there is another event, displays next event poster thumbnail, etc -->
              <td height="150" width="150">
                <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                  <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                  ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                  ?>.jpg" alt="Smiley face" height="150" width="150"></a>
                <?php } ?>
              </td>
              <!-- if there is another event, displays next event poster thumbnail, etc -->
              <td height="150" width="150">
                <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                  <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                  ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                  ?>.jpg" alt="Smiley face" height="150" width="150"></a>
                <?php } ?>
              </td>
              <!-- if there is another event, displays next event poster thumbnail, etc -->
              <td height="150" width="150">
                <?php if($event = mysqli_fetch_assoc($event_set)) { ?>
                  <a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                  ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                  ?>.jpg" alt="Smiley face" height="150" width="150"></a>
                <?php } ?>
              </td>
              <!-- if there is another event, displays next event poster thumbnail, etc -->
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
        
        <!-- discards event set object -->
        <?php
          mysqli_free_result($event_set);
        ?>
      <?php } ?>
    </div>
</div>

<!-- includes footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>
