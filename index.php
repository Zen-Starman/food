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

include('views/head.html');
//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define a default route
//you can do GET /home/main/hello/
$f3->route('GET /', function(){
    //display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /breakfast', function(){
    //display a view
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

$f3->route('GET /b-cont', function(){
    //display a view
    $view = new Template();
    echo $view->render('views/bfast-cont.html');
});

$f3->route('GET /lunch', function(){
    //display a view
    $view = new Template();
    echo $view->render('views/lunch.html');
});

$f3->route('GET /lunch/brunch/buffet', function(){
    //display a view
    $view = new Template();
    echo $view->render('views/buffet.html');
});

$f3->route('GET /order', function(){
    $view = new Template();
    echo $view->render('views/form1.html');
});

$f3->route('POST /order-process', function(){

    print_r($_POST);

    $view = new Template();
    echo $view->render('views/form2.html');
});

//Define a route with a parameter
$f3->route('GET /@item', function($f3, $params){
    //so if I say http://zts.greenriverdev.com/328/food/taco
    //It will search for the page. Else it will echo/return the passed param

    $item = $params['item'];

//    $foodsWeServe = array('spaghetti', 'enchiladas', 'phad thai', 'gyros', 'lumpia');

    //this would be another way of handling, however we already have the switch statement.
//    if (!in_array($item, $foodsWeServe))
//    {
//        echo "We don't serve $item";
//    }

    switch ($item) {
        case 'spaghetti':
            echo "<h3>I like $item with meatballs.</h3>";
            break;
        case 'pizza':
            echo "<h3>Pepperoni or veggie?</h3>";
            break;
        case 'tacos':
            echo "<h3>Sorry we don't have $item.</h3>";
            break;
        case 'bagel':
            $f3->reroute("/b-cont");
        default:
            $f3->error(404);

    }
//    echo $params[item];
    //you can also add parameters to routes
    //ie: food/breakfast/@item
});

$f3->route('GET /@first/@last', function($f3, $param)
{
    $first = ucfirst($param['first']);
    $last = ucfirst($param['last']);
   echo "<h3>Hello, $first $last!</h3>";
});

$f3->route('GET /order', function()
{
    $view = new Template();
    echo $view->render('views/order.html');
});
//Run Fat-free
$f3->run(); // ->called the object operator