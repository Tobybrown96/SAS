<?php

  function find_all_sally() {
    global $db;

    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY id ASC";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_sally_by_id($id) {
    global $db;

    $sql = "SELECT * FROM salamander ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $sally = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $sally; // returns an assoc. array
  }

  function validate_sally($sally) {
    $errors = [];

    // name
    if(is_blank($sally['name'])) {
      $errors[] = "Name cannot be blank.";
    }
    if(!has_length($sally['name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }
    if(is_blank($sally['description'])) {
      $errors[] = "Description cannot be blank.";
    }
    if(is_blank($sally['habitat'])) {
      $errors[] = "Habitat cannot be blank.";
    }

    return $errors;
  }

  function insert_sally($sally) {
    global $db;

    $errors = validate_sally($sally);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'" . $sally['name'] . "',";
    $sql .= "'" . $sally['habitat'] . "',";
    $sql .= "'" . $sally['description'] . "'";
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

  function update_sally($sally) {
    global $db;

    $errors = validate_sally($sally);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE salamander SET ";
    $sql .= "name='" . $sally['name'] . "', ";
    $sql .= "habitat='" . $sally['habitat'] . "', ";
    $sql .= "description='" . $sally['description'] . "' ";
    $sql .= "WHERE id='" . $sally['$id'] . "' ";
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

  function delete_sally($id) {
    global $db;

    $sql = "DELETE FROM salamander ";
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