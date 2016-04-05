<?php

//Написать функцию delete($connection, $table, $id). Функция должна удалять запись с указанным $id.

function delete($connection, $table, $id) {

    // Connect to database server
    $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
    // Select database
    mysqli_select_db($link, $connection) or die('Could not select database');

    //Performing SQL query
    $query = "DELETE FROM $table WHERE id = $id";

    $result = mysqli_query($link, $query) or die('Query failed ' . mysqli_error($link));

    //Closing connection
    mysqli_close($link);

}

delete('practice_db', 'students', 11);