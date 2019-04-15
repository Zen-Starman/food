<?php

/**
 *  Practice Routing
 *  Author: Zane Stearman
 *  Date:   04/15/2019
 *  File:   index.php
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define a default route
//you can do GET /home/main/hello/
$f3->route('GET /', function(){
    //display a view
//    $view = new Template();
//    echo $view->render('views/home.html');
    echo "<h1>Breakfast Page</h1>";
});

//Run Fat-free
$f3->run(); // ->called the object operator