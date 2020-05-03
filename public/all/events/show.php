<!-- page purpose - event page -->

<!-- loads core resources -->
<?php require_once('../../../private/initialize.php'); ?>

<?php
    # if user arrives here directly - i.e. not from events page - assigns event id to 1
    // $id = isset(%_GET['id']) ? $_GET['id'] : '1';
    $id = $_GET['id'] ?? '1'; // PHP > 7.0

    $event = find_event_by_id($id);
    
?>

<!-- sets page title -->
<?php $page_title = 'Event Page'; ?>

<!-- loads header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
  <!-- links back to events listing -->
  <a class="back-link" href="<?php echo url_for('/all/events/index.php'); ?>">&laquo; Back to Events</a>

  <div class="event show">

  <!-- displays event name -->
  <h1>Event: Hi Zero <?php echo h($event['name']); ?></h1>

    <div class="attributes">
      <!-- finds readers associated with the event -->
      <?php 
        $reader_set = find_readers_for_event($id);
      ?>
      <!-- only displays this section if readers are returned -->
      <?php if (mysqli_num_rows($reader_set) > 0) { ?>
        <dl>
          <dt>Readers</dt>
          
            <!-- displays list of readers, with links to their reader page, passing reader id to it -->
            <?php
              while($reader = mysqli_fetch_assoc($reader_set)) { 
            ?>
              <dd>
                <a class="action" href="
                  <?php echo url_for('/all/readers/show.php?id=' . h(u($reader['id']))); 
                  ?>
                    "><?php echo h($reader['name']); ?>
                </a>
              </dd>
            <?php } ?>
        </dl>
      <?php } ?>
      <!-- drops reader set object -->
      <?php
          mysqli_free_result($reader_set);
      ?>  
      <dl>
        <dt>Poster</dt>
        <dd>
        <!-- displays poster and links to hi res version -->
        <a class="action" href="<?php echo url_for('/images/' . h(u($event['poster_hi']))); 
                  ?>.jpg"><img src="<?php echo url_for('/images/' . h(u($event['poster_500']))); 
                  ?>.jpg" alt="Smiley face" width="500"></a>
          
          
        </dd>
      </dl>

      <dl>
        <dt>Date</dt>
        <dd><?php echo h($event['date_char']); ?></dd>
      </dl>
  </div>

  <!-- finds readings associated with the event -->
  <?php
    $reading_set = find_readings_for_event($id)
  ?>

  <!-- only displays this section if readings are returned -->
  <?php if (mysqli_num_rows($reading_set) > 0) { ?>

    <div class="readings listing">
          <h2>Readings</h2>

          <table class="list">
            <tr>
                <th>Name</th>
                <th>Audio</th>
            </tr>
              <!-- while there are readings to load, load them -->
              <?php
                while($reading = mysqli_fetch_assoc($reading_set)) { 
              ?>
            <tr>
              <td>
                <?php echo h($reading['name']); ?>
              </td>
              <td>
                <!-- displays reading mp3 in audio player -->
                <audio controls>
                  <source src="<?php echo url_for('/readings/' . h(u($reading['filename']))); ?>.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
              </td>
            </tr>
            <?php } ?>
          </table>
      </div>
      <!-- drops reading set object -->
      <?php
            mysqli_free_result($reading_set);
        ?>  
    </div>

  <?php } ?>
</div>

<!-- loads footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>
