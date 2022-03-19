<?php

    $db = mysqli_connect('localhost', 'root', '', 'db-carwash2');

    function querySql($query)
        {
        global $db;

        $item = mysqli_query($db, $query);
        $items = [];

        while ($row = mysqli_fetch_assoc($item)) {
            $items[] = $row;
            }

        return $items;
        }
        ?>