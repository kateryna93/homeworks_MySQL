<?php

/*Написать функцию update($connection, $table, $data, $id). Функция похожая по функционалу на insert но должна
не вставлять, а изменять запись с указанным $id.*/

function update($connection, $table, $data, $id) {

    // Connect to database server
    $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
    // Select database
    mysqli_select_db($link, $connection) or die('Could not select database');

    //Performing SQL query
    $cols = [];
    $rows = [];
    foreach ($data as $key => $value) {
        $cols[] = $key;
        $rows[] = "'" . $data[$key] . "'";
    }

    $arrForUpdate = [];
    for ($i = 0; $i < count($cols); $i++) {

        for ($j = 0; $j < $i; $j++) {
        }

        $arrForUpdate[] = $cols[$i] . ' = ' . $rows[$j];//combine 2 values in one for UPDATE template

    }

    $part = implode(', ', $arrForUpdate);//make string for UPDATE template

    $query = "UPDATE $table SET $part WHERE id = $id";

    $result = mysqli_query($link, $query) or die('Query failed ' . mysqli_error($link));

    //Closing connection
    mysqli_close($link);

}

//Example
update('practice_db', 'students', ['name' => 'Iryna', 'age' => 20, 'sex' => 'f'], 1);