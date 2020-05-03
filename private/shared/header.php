<?php 
    # if the page title isn't set, set it as HI ZERO > sound archive
    if(!isset($page_title)) { $page_title = 'HI ZERO > sound archive'; }
?>
<!doctype html>

<html lang="en">
  <head>
    <!-- gets page title --> 
    <title><?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <!-- gets page styling --> 
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/all.css'); ?>" />
  </head>

  <body>
    <header>
    <!-- displays the search bar -->  
    <h1><form action="<?php echo url_for('/all/search/index.php?id='); ?>">
      <label for="hsearch">HI ZERO > sound archive</label>
        <!-- passes search term q to the resultant search listings page -->  
        <input type="search" id="q" name="q" >
        <!-- sets value of form button -->  
        <input type="submit" value="Hi Zero Search">
      </form>
      </h1>
    </header>

    <navigation>
      <ul>
        <!-- links back to Main Menu page -->  
        <li><a href="<?php echo url_for('/all/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>