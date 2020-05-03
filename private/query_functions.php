<?php

    # finds all visible events for one particular year
    function find_all_events($year) {
        global $db;

        $sql = "SELECT * FROM events ";
        $sql .= "WHERE visible='1' ";
        $sql .= "AND date LIKE '" . $year . "%'";
        $sql .= "ORDER BY date ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    # finds event for the page id passed from events listing page
    function find_event_by_id($id) {
        global $db;

        $sql = "SELECT * FROM events ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $event = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $event; //returns an assoc. array
    }

    // finds all visible readers
    function find_all_readers() {
        global $db;
        
        $sql = "SELECT * FROM readers ";
        $sql .= "WHERE visible='1' ";
        $sql .= "ORDER BY name ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    # finds reader for the reader id passed from readers listing page
    function find_reader_by_id($id) {
        global $db;

        $sql = "SELECT * FROM readers ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $reader = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $reader; //returns an assoc. array
    }

    # finds events where one particular reader attended, passing in reader id
    function find_events_for_reader($id) {
        global $db;

        $sql = "SELECT events.id, events.name FROM events ";
        $sql .= "JOIN events_readers ON events_readers.event_id = events.id ";
        $sql .= "JOIN readers ON readers.id = events_readers.reader_id ";
        $sql .= "WHERE events_readers.reader_id='" . $id . "'";
        $sql .= "ORDER BY events.date DESC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    # finds all readers where one particular event, passing in event id
    function find_readers_for_event($id) {
        global $db;

        $sql = "SELECT readers.id, readers.name FROM readers ";
        $sql .= "JOIN events_readers ON events_readers.reader_id = readers.id ";
        $sql .= "JOIN events ON events.id = events_readers.event_id ";
        $sql .= "WHERE events_readers.event_id='" . $id . "'";
        $sql .= "AND readers.visible='1' ";
        $sql .= "ORDER BY readers.name ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    # finds all readings where one particular event, passing in event id
    function find_readings_for_event($id) {
        global $db;

        $sql = "SELECT readings.name, readings.filename FROM readings ";
        $sql .= "JOIN events ON events.id = readings.event_id ";
        $sql .= "WHERE events.id='" . $id . "' ";
        $sql .= "AND readings.visible='1' ";
        $sql .= "ORDER BY readings.filename ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    # finds all readings where one particular reader, passing in reader id
    function find_readings_for_reader($id) {
        global $db;

        $sql = "SELECT readings.name, readings.filename FROM readings ";
        $sql .= "JOIN readers_readings ON readers_readings.reading_id = readings.id ";
        $sql .= "JOIN readers ON readers.id = readers_readings.reader_id ";
        $sql .= "WHERE readers.id='" . $id . "' ";
        $sql .= "AND readings.visible='1' ";
        $sql .= "ORDER BY readings.filename ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    # searches all events for search query. searches date, event name and reader name
    function search_events($q) {
        global $db;

        $sql = "SELECT events.id, events.poster_150, events.name as eventName, events.date, events.date_char FROM events ";
        $sql .= "JOIN events_readers ON events_readers.event_id = events.id ";
        $sql .= "JOIN readers ON readers.id = events_readers.reader_id ";
        $sql .= "WHERE events.date LIKE '%" . $q . "%' ";
        $sql .= "OR events.date_char LIKE '%" . $q . "%' ";
        $sql .= "OR events.name LIKE '%" . $q . "%' ";
        $sql .= "OR readers.name LIKE '%" . $q . "%' ";
        $sql .= "AND readers.visible='1' ";
        $sql .= "GROUP BY events.id ";
        $sql .= "ORDER BY events.date DESC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    # searches all readers for search query
    function search_readers($q) {
        global $db;

        $sql = "SELECT * FROM readers ";
        $sql .= "WHERE name LIKE '%" . $q . "%' ";
        //$sql .= "OR description LIKE '%" . $q . "%' ";
        $sql .= "AND visible='1' ";
        $sql .= "ORDER BY name ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

?>