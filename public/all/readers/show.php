<!-- page purpose - reader page -->

<!-- loads core resources -->
<?php require_once('../../../private/initialize.php'); ?>

<?php

    # if user arrives here directly - i.e. not from readers page - assigns reader id to 1
    // $id = isset(%_GET['id']) ? $_GET['id'] : '1';
    $id = $_GET['id'] ?? '1'; // PHP > 7.0

    # finds reader by reader id passed from reader listings page
    $reader = find_reader_by_id($id);

?>
<!-- sets page title -->
<?php $page_title = 'Reader Page'; ?>

<!-- includes header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <!-- links back to readers listing -->
  <a class="back-link" href="<?php echo url_for('/all/readers/index.php'); ?>">&laquo; Back to Readers</a>

  <div class="reader show">

  <h1>Reader: <?php echo h($reader['name']); ?></h1>

    <div class="attributes">
    <!-- only displays reader description is description field has a value  -->
      <?php if (h($reader['description']) <> NULL) { ?>
        <dl>
          <dt>Description</dt>
          <dd><?php echo h($reader['description']); ?></dd>
        </dl>
      <?php } ?>

      <dl>
        <dt>Events</dt>

        <!-- finds events associated to this reader, by the reader id -->
        <?php 
            $event_set = find_events_for_reader($id);
          ?>
          <!-- while there is an event result to load, load it -->
          <?php
            while($event = mysqli_fetch_assoc($event_set)) { 
          ?>
            <dd>
            <!-- displays event name, and links to event page, passing event id  -->
              <a class="action" href="
                <?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>
                  ">Hi Zero <?php echo h($event['name']); ?>
              </a>
            </dd>
          <?php } ?>
      </dl>

      <?php
          # drops event set object
          mysqli_free_result($event_set);
      ?> 

    </div>

    <!-- finds readings associated to this reader, passing reader id  -->
    <?php
      $reading_set = find_readings_for_reader($id)
    ?>
    <!-- only displays this section if there are readings associated to this reader  -->
    <?php if (mysqli_num_rows($reading_set) > 0) { ?>
      <div class="readings listing">
          <h2>Readings</h2>

          <table class="list">
            <tr>
                <th>Name</th>
                <th>Audio</th>
            </tr>
              <!-- while there is a reading result to load, load it  -->
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
    <?php } ?>
    <!-- drops reading set object -->
    <?php
          mysqli_free_result($reading_set);
      ?>  
  </div>

</div>

<!-- includes footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>
