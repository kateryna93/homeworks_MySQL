<?php

/*Написать функцию select($connection, $table, $id = null).  Функция должна делать SELECT запрос в таблицу $table.
Если передан необязательный параметр $id то функция должна выбирать одну запись с указанным id.*/

function select($connection, $table, $id = NULL) {

    // Connect to database server
    $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
    // Select database
    mysqli_select_db($link, $connection) or die('Could not select database');


    //Performing SQL query
    $query = ( isset($id) ) ? "SELECT * FROM $table WHERE id = $id" : "SELECT * FROM $table";

    $result = mysqli_query($link, $query) or die('Query failed ' . mysqli_error($link));

    echo '<pre>';

    while ( $line = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
        print_r($line);
    }


    //Free resultset
    mysqli_free_result($result);


    //Closing connection
    mysqli_close($link);

}

//Example
select('practice_db', 'students');