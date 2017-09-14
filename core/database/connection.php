<?php
$config = require "config.php";
$connection = $config['database'];
try {
    return new PDO(
                    'mysql:host='.$connection['host'].';dbname='.$connection['dbname'],
                         $connection['user'],
                         $connection['pass'],
                         $connection['options']
    );
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    print "Попробуйте зайти позже";
    die();
}