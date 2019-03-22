<?php

/*
mysqli_query() is used rather than prepared statements. In order to ensure no sql injection, care has been taken to always use quotes and escape dynamic-data values.
*/

    function find_all_tokens() {
        global $db;
        
        $sql = "SELECT * FROM tokens ";
        $sql .=  "ORDER BY position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_token_by_id($id) {
        global $db;

        $sql = "SELECT * FROM tokens ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $token = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $token; // returns an assoc. array
    }

    function validate_token($token) {

        $errors = [];
        
        // token
        if(is_blank($token['token'])) {
            $errors[] = "Name cannot be blank.";
        }
        if(!has_length($token['token'], ['min' => 2, 'max' => 255])) {
            $errors[] = "Name must be between 2 and 255 characters.";
        }

        /*
        // position
        // Make sure we are working with an integer
        $postion_int = (int) $token['position'];
        if($postion_int <= 0) {
            $errors[] = "Position must be greater than zero.";
        }
        if($postion_int > 999) {
            $errors[] = "Position must be less than 999.";
        }
        */

        // visible
        // Make sure we are working with a string
        $visible_str = (string) $token['visible'];
        if(!has_inclusion_of($visible_str, ["0","1"])) {
            $errors[] = "Visible must be true or false.";
        }

        return $errors;
    }


    function insert_token($token) {
        global $db;

        $errors = validate_token($token);
        if(!empty($errors)) {
            return $errors;
        }

        $sql = "INSERT INTO tokens ";
        $sql .= "(token, ticker, quantity, position, visible) ";
        $sql .= "VALUES (";
        $sql .= "'" . $token['token'] . "',";
        $sql .= "'" . $token['ticker'] . "',";
        $sql .= "'" . $token['quantity'] . "',";
        $sql .= "'" . $token['position'] . "',";
        $sql .= "'" . $token['visible'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
        return true;
        } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
    }

    function update_token($token) {
        global $db;

        $errors = validate_token($token);
        if(!empty($errors)) {
            return $errors;
        }

        $sql = "UPDATE tokens SET ";
        $sql .= "token='" . $token['token'] . "', ";
        $sql .= "ticker='" . $token['ticker'] . "', ";
        $sql .= "quantity='" . $token['quantity'] . "', ";
        $sql .= "position='" . $token['position'] . "', ";
        $sql .= "visible='" . $token['visible'] . "' ";
        $sql .= "WHERE id='" . $token['id'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if($result) {
        return true;
        } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }

     }

    function delete_token($id) {
        global $db;

        $sql = "DELETE FROM tokens ";
        $sql .= "WHERE id='" . $id . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if($result) {
        return true;
        } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
    }

    function find_all_exchanges() {
        global $db;

        $sql = "SELECT * FROM exchanges ";
        $sql .= "ORDER BY position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_exchange_by_id($id) {
        global $db;

        $sql = "SELECT * FROM exchanges ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $exchange = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $exchange; // returns an assoc. array
    }

    function validate_exchange($exchange) {

    $errors = [];
    
    // name
    if(is_blank($exchange['name'])) {
        $errors[] = "Name cannot be blank.";
    }
    if(!has_length($exchange['name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Name must be between 2 and 255 characters.";
    }
    
    /*
    // position
    // Make sure we are working with an integer
    $postion_int = (int) $exchange['position'];
    if($postion_int <= 0) {
        $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
        $errors[] = "Position must be less than 999.";
    }
    */

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $exchange['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
        $errors[] = "Visible must be true or false.";
    }

    // location
    if(is_blank($exchange['location'])) {
    $errors[] = "Location cannot be blank.";
    }

    return $errors;
    }

    function insert_exchange($exchange) {
        global $db;
        
        $errors = validate_exchange($exchange);
        if(!empty($errors)) {
        return $errors;
        }

        $sql = "INSERT INTO exchanges ";
        $sql .= "(name, kyc, position, visible, location) ";
        $sql .= "VALUES (";
        $sql .= "'" . $exchange['name'] . "',";
        $sql .= "'" . $exchange['kyc'] . "',";
        $sql .= "'" . $exchange['position'] . "',";
        $sql .= "'" . $exchange['visible'] . "',";
        $sql .= "'" . $exchange['location'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
        return true;
        } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
    }

    function update_exchange($exchange) {
        global $db;
        
        $errors = validate_exchange($exchange);
        if(!empty($errors)) {
        return $errors;
        }

        $sql = "UPDATE exchanges SET ";
        $sql .= "name='" . $exchange['name'] . "', ";
        $sql .= "kyc='" . $exchange['kyc'] . "', ";
        $sql .= "position='" . $exchange['position'] . "', ";
        $sql .= "visible='" . $exchange['visible'] . "', ";
        $sql .= "location='" . $exchange['location'] . "' ";
        $sql .= "WHERE id='" . $exchange['id'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if($result) {
        return true;
        } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
    }

    function delete_exchange($id) {
        global $db;

        $sql = "DELETE FROM exchanges ";
        $sql .= "WHERE id='" . $id . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if($result) {
        return true;
        } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
    }
?>