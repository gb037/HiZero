<?php

  # gets database credentials
  require_once('db_credentials.php');

  # connects to db using credentials and creates connection object
  function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    mysqli_set_charset ( $connection , 'utf8');
    return $connection;
  }

  # disconnects and drops connection object
  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  # if db connect fails, displays error message and error no 
  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  # if a query fails, displays an error message
  function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }

?>
