<!-- page purpose - search results listing -->

<!-- loads core resources -->
<?php require_once('../../../private/initialize.php'); ?>

<?php
    # if user arrives here directly - i.e. not from a search - assigns query value to #
    // $id = isset(%_GET['id']) ? $_GET['id'] : '1';
    $q = $_GET['q'] ?? '#'; // PHP > 7.0

?>

<!-- sets page title -->
<?php $page_title = 'Search results'; ?>
<!-- includes header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <div class="search results listing">
        <h1>Search results</h1>
        <!-- displays search query -->
        <p>for <i><?php echo $q ?></i></p>
        <!-- finds search results - searching the events table - first sanitising the search query -->
        <?php 
            $search_events = search_events(da(h($q))); 
        ?>
        <!-- only displays this section if query returns event results -->
        <?php if (mysqli_num_rows($search_events) > 0) { ?>

            <h2>Events</h2>
            <table class="list">
            <tr>
                <th>Thumbnail</th>
                <th>Name</th>
                <th>Date</th>
                <th>Readers</th>
            </tr>
            <!-- while there are event results to load, load them -->
            <?php while($event = mysqli_fetch_assoc($search_events)) { ?>
                <tr>
                <!-- displays event thumbnail, name and date -->
                <td><a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a></td>
                <td><a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>">Hi Zero <?php echo h($event['eventName']); ?></a></td>
                <td><a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><?php echo h($event['date_char']); ?></a></td>
                <td>
                <!-- finds readers associated with this event -->
                <?php 
                    $id = h(u($event['id'])); 
                    $reader_set = find_readers_for_event($id);
                    # while there are reader results to load, load them
                    while($reader = mysqli_fetch_assoc($reader_set)) { 
                        ?>
                        <dd>
                            <?php echo h($reader['name']); ?>
                        </dd>
                        <?php } ?>
                        <?php
                            mysqli_free_result($reader_set);
                        ?>  
                </td>
                </tr>
            <?php } ?>
            </table>
        <?php } ?>

        <!-- finds search results - searching the readers table - first sanitising the search query -->
        <?php
        $search_readers = search_readers(da(h($q)));
        ?>

        <!-- only displays this section if query returns reader results -->
        <?php if (mysqli_num_rows($search_readers) > 0) { ?>
            
            <h2>Readers</h2>

            <table class="list">

            <tr>
                <th>Name</th>
            </tr>

            <!-- while there are reader results to load, load them -->
            <?php while($reader = mysqli_fetch_assoc($search_readers)) { ?>
                <tr>
                <!-- displays reader name, linking to reader page, passing reader id to it -->
                <td><a class="action" href="<?php echo url_for('/all/readers/show.php?id=' . h(u($reader['id']))); 
                ?>"><?php echo h($reader['name']); ?></a></td>
                </tr>
            <?php } ?>
            </table>

        <?php } ?>

        <!-- if there are no results, displays an appropriate message -->
        <?php if ((mysqli_num_rows($search_events) === 0) and (mysqli_num_rows($search_readers) === 0)) { ?>
            <p>No results</p>
        <?php }?>

        <?php
            # drops event set object
            mysqli_free_result($search_events);
            # drops reader set object
            mysqli_free_result($search_readers);
        ?>

  </div>
</div>

<!-- includes footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>