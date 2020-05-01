<?php require_once('../../../private/initialize.php'); ?>

<?php

    // $id = isset(%_GET['id']) ? $_GET['id'] : '1';
    $id = $_GET['id'] ?? '1'; // PHP > 7.0

    $event = find_event_by_id($id);
    
?>

<?php $page_title = 'Event Page'; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/all/events/index.php'); ?>">&laquo; Back to Events</a>

  <div class="event show">

  <h1>Event: Hi Zero <?php echo h($event['name']); ?></h1>

    <div class="attributes">
      <?php 
        $reader_set = find_readers_for_event($id);
      ?>
      <?php if (mysqli_num_rows($reader_set) > 0) { ?>
        <dl>
          <dt>Readers</dt>
          

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
      <?php
          mysqli_free_result($reader_set);
      ?>  
      <dl>
        <dt>Poster</dt>
        <dd>
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

  <?php
    $reading_set = find_readings_for_event($id)
  ?>

  <?php if (mysqli_num_rows($reading_set) > 0) { ?>

    <div class="readings listing">
          <h2>Readings</h2>


          <table class="list">
            <tr>
                <th>Name</th>
                <th>Audio</th>
            </tr>
              <?php
                while($reading = mysqli_fetch_assoc($reading_set)) { 
              ?>
            <tr>
              <td>
                <?php echo h($reading['name']); ?>
              </td>
              <td>
                <audio controls>
                  <source src="<?php echo url_for('/readings/' . h(u($reading['filename']))); ?>.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
              </td>
            </tr>
            <?php } ?>
          </table>
      </div>
      <?php
            mysqli_free_result($reading_set);
        ?>  
    </div>

  <?php } ?>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
