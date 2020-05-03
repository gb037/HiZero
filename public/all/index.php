<!-- page purpose - main menu page -->

<!-- loads core resources-->
<?php require_once('../../private/initialize.php'); ?>

<!-- sets page title -->
<?php $page_title = 'Menu'; ?>
<!-- includes header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

    <div id="main-menu">
    <h2>Main Menu</h2>
        <ul>
            <!-- links to events listing -->
            <li><a href="<?php echo url_for('/all/events/index.php'); ?>">Events</a>
            </li>
            <!-- links to readers listing -->
            <li><a href="<?php echo url_for('/all/readers/index.php'); ?>">Readers</a>
            </li>
        </ul>
    </div>

</div>

<!-- includes footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

