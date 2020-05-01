<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Menu'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

    <div id="main-menu">
    <h2>Main Menu</h2>
        <ul>
            <li><a href="<?php echo url_for('/all/events/index.php'); ?>">Events</a>
            </li>
            <li><a href="<?php echo url_for('/all/readers/index.php'); ?>">Readers</a>
            </li>
        </ul>
    </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>

