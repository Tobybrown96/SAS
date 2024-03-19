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

?>