<?php

    $connect = mysqli_connect('localhost', 'spaceman', 'bobkovwartoof', 'traf_db');

    if (!$connect) {
        die('Error connect to DataBase');
    }