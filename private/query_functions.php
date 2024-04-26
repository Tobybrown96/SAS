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
  
    $sql = "SELECT * FROM salamander WHERE id=?";
    $stmt = mysqli_prepare($db, $sql);
  
    mysqli_stmt_bind_param($stmt, "i", $id);
  
    if(!mysqli_stmt_execute($stmt)) {
      echo "Error Finding Salamander: " . mysqli_error($db);
    } else {
      $result = mysqli_stmt_get_result($stmt);
      $sally = mysqli_fetch_assoc($result);
      return $sally;
    }
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

    $sql = "INSERT INTO salamander (name, habitat, description) ";
    $sql .= "VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);

    mysqli_stmt_bind_param($stmt, "sss", $name, $habitat, $description);
    $name = $sally['name'];
    $habitat = $sally['habitat'];
    $description = $sally['description'];

    $result = mysqli_stmt_execute($stmt);
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

    $sql = "UPDATE salamander SET name = ?, habitat = ?, description = ? WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);

    mysqli_stmt_bind_param($stmt, "sssi", $name, $habitat, $description, $id);
    $name = $sally['name'];
    $habitat = $sally['habitat'];
    $description = $sally['description'];
    $id = $sally['id'];

    $result = mysqli_stmt_execute($stmt);
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