<footer>
      <!-- prints copyright message-->
      &copy; <?php echo date('Y'); ?> Hi Zero
  </footer>

  </body>
</html>

<?php
  # closes database connection
  db_disconnect($db);
?>