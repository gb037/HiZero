<?php require_once('../../../private/initialize.php'); ?>

<?php
    // $id = isset(%_GET['id']) ? $_GET['id'] : '1';
    $q = $_GET['q'] ?? '#'; // PHP > 7.0

?>

<?php $page_title = 'Search results'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <div class="search results listing">
        <h1>Search results</h1>
        <p>for <i><?php echo $q ?></i></p>
        <?php 
            $search_events = search_events(da(h($q))); 
        ?>
        <?php if (mysqli_num_rows($search_events) > 0) { ?>

            <h2>Events</h2>
            <table class="list">
            <tr>
                <th>Thumbnail</th>
                <th>Name</th>
                <th>Date</th>
                <th>Readers</th>
            </tr>

            <?php while($event = mysqli_fetch_assoc($search_events)) { ?>
                <tr>
                <td><a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><img src="<?php echo url_for('/images/' . h(u($event['poster_150']))); 
                ?>.jpg" alt="Smiley face" height="150" width="150"></a></td>
                <td><a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>">Hi Zero <?php echo h($event['eventName']); ?></a></td>
                <td><a class="action" href="<?php echo url_for('/all/events/show.php?id=' . h(u($event['id']))); 
                ?>"><?php echo h($event['date_char']); ?></a></td>
                <td>
                <?php 
                    $id = h(u($event['id'])); 
                    $reader_set = find_readers_for_event($id);
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


        <?php
        $search_readers = search_readers(da(h($q)));
        ?>

        <?php if (mysqli_num_rows($search_readers) > 0) { ?>
            
            <h2>Readers</h2>

            <table class="list">

            <tr>
                <th>Name</th>
            </tr>

            <?php while($reader = mysqli_fetch_assoc($search_readers)) { ?>
                <tr>
                <td><a class="action" href="<?php echo url_for('/all/readers/show.php?id=' . h(u($reader['id']))); 
                ?>"><?php echo h($reader['name']); ?></a></td>
                </tr>
            <?php } ?>
            </table>

        <?php } ?>

        <?php if ((mysqli_num_rows($search_events) === 0) and (mysqli_num_rows($search_readers) === 0)) { ?>
            <p>No results</p>
        <?php }?>

        <?php
            mysqli_free_result($search_events);
            mysqli_free_result($search_readers);
        ?>

  </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>