<?php

function DatabaseConnection(): PDO              //creates a function for connecting to the database so rather than having to connect to the databes
{                                               // on each page I can just call the function
    $db = new PDO('mysql:host=db; dbname=Collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $db;
}
