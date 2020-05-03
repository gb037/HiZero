<?php

    // adds root to each relative link 
    function url_for($script_path) {
        // add the leading '/' if not present
        if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path;
    }

    # formats url correctly
    function u($string="") {
        return urlencode($string);
    }
    
    function raw_u($string="") {
    return rawurlencode($string);
    }

    # removes special chars, prevents sql injection
    function h($string="") {
        return htmlspecialchars($string);
    }

    # stops apostrophes in search query causing issues
    function da($string="") {
        return str_replace("'","''",$string);
    }

    # extracts year from a date string
    function year($string="") {
        $string = strtotime($string);
        return date("Y", $string);
    }

    function error_404() {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        exit(); 
    }
      
    function error_500() {
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
    }

    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }
?>