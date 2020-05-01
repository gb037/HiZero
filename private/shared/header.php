<?php 
    if(!isset($page_title)) { $page_title = 'HI ZERO > sound archive'; }
?>
<!doctype html>

<html lang="en">
  <head>
    <title><?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/all.css'); ?>" />
  </head>

  <body>
    <header>
      
    <h1><form action="<?php echo url_for('/all/search/index.php?id='); ?>">
      <label for="hsearch">HI ZERO > sound archive</label>
        <input type="search" id="q" name="q" >
        <input type="submit" value="Hi Zero Search">
      </form>
      </h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/all/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>