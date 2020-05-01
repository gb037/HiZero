<?php require_once('../../../private/initialize.php'); ?>

<?php

    // $id = isset(%_GET['id']) ? $_GET['id'] : '1';
    $id = $_GET['id'] ?? '1'; // PHP > 7.0

    $reader = find_reader_by_id($id);

?>

<?php $page_title = 'Reader Page'; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/all/readers/index.php'); ?>">&laquo; Back to Readers</a>

  <div class="reader show">

  <h1>Reader: <?php echo h($reader['name']); ?></h1>

    <div class="attributes">
      <?php if (h($reader['description']) <> NULL) { ?>
      <!-- if count(description) > 0 then  -->
        <dl>
          <dt>Description</dt>
          <dd><?php echo h($reader['description']); ?></dd>
        </dl>
      <?php } ?>



      <dl>
        <dt>Events</dt>

        <?php 
            $event_set = find_events_for_reader($id);
          ?>
          <?php
            while($event = mysqli_fetch_assoc($event_set)) { 
          ?>
            <dd>
              <a class="action" href="
                <?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>
                  ">Hi Zero <?php echo h($event['name']); ?>
              </a>
            </dd>
          <?php } ?>
      </dl>

      <?php
          mysqli_free_result($event_set);
      ?> 

    </div>
    <?php
      $reading_set = find_readings_for_reader($id)
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
    <?php } ?>
    <?php
          mysqli_free_result($reading_set);
      ?>  
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
