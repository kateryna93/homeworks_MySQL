<?php

/*Написать функцию insert($connection, $table, $data). Функция должна добавлять в таблицу $table новую запись с данными
из массива $data где ключ массива это поле (колонка) а значение массива это сама запись.*/

function insert($connection, $table, $data) {

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

    $part1 = implode(', ', $cols);//column in table
    $part2 = implode(', ', $rows);//rows in table

    $query = "INSERT INTO $table ($part1) VALUES ($part2)";

    $result = mysqli_query($link, $query) or die('Query failed ' . mysqli_error($link));

    //Closing connection
    mysqli_close($link);

}

//Example
insert('practice_db', 'students', ['name' => 'Dina', 'age' => 22, 'sex' => 'f']);