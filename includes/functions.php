<?php

// getCount v0.1

function getCount($item, $table)
{
    // Connect to database
    global $connect;

    //The Statment
    $stmt = "SELECT $item FROM $table ";
    $stmt_query = $connect->query($stmt);
    $count = mysqli_num_rows($stmt_query);
    return $count;

}


// getCount v0.1

function getItem($item, $table)
{
    // Connect to database
    global $connect;

    //The Statment
    $stmt = "SELECT $item FROM $table ";
    $stmt_query = $connect->query($stmt);
    return $stmt_query;

}


?>