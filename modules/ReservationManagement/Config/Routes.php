<?php
$routes->group('facility', ['namespace' => 'Modules\ReservationManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Facility::index');
    $routes->match(['get', 'post'], 'a', 'Facility::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Facility::edit/$1');
    $routes->add('d/(:num)', 'Facility::delete/$1');
});

$routes->group('reservations', ['namespace' => 'Modules\ReservationManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Reservation::index');
    $routes->match(['get', 'post'], 'a', 'Reservation::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Reservation::edit/$1');
    $routes->add('d/(:num)', 'Reservation::delete/$1');
    $routes->add('v/(:num)', 'Reservation::view/$1');
    $routes->add('app/(:num)', 'Reservation::approve/$1');
    $routes->add('free/(:num)', 'Reservation::approvedFree/$1');
    $routes->add('rej/(:num)', 'Reservation::reject/$1');
    $routes->add('res/(:num)', 'Reservation::reset/$1');
    $routes->add('g/(:num)', 'Reservation::generateReceipt/$1');
    $routes->add('r', 'Reservation::generateReport');
    $routes->add('f/(:num)', 'Reservation::generateForm/$1');
    $routes->add('p/(:num)', 'Reservation::generatePermit/$1');
    $routes->add('t', 'Reservation::calendar');
    $routes->add('submit-receipt/(:num)', 'Reservation::submitReceipt/$1');
    $routes->add('verify/(:num)', 'Reservation::verify/$1');
    $routes->add('end/(:num)', 'Reservation::end/$1');
    $routes->add('cancel/(:num)', 'Reservation::cancel/$1');
    $routes->add('reupload/(:num)', 'Reservation::reupload/$1');
    $routes->add('return/(:num)', 'Reservation::return/$1');
    $routes->add('undo-return/(:num)', 'Reservation::undoReturn/$1');
    $routes->post('preview', 'Reservation::preview');
});