<?php

$routes->group('equipments', ['namespace' => 'Modules\EquipmentManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Equipment::index');
    $routes->match(['get', 'post'], 'a', 'Equipment::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Equipment::edit/$1');
    $routes->add('d/(:num)', 'Equipment::delete/$1');
});

$routes->group('borrowed-equipments', ['namespace' => 'Modules\EquipmentManagement\Controllers'], function ($routes) {
    $routes->add('/', 'BorrowedEquipment::index');
    $routes->match(['get', 'post'], 'a', 'BorrowedEquipment::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'BorrowedEquipment::edit/$1');
    $routes->add('d/(:num)', 'BorrowedEquipment::delete/$1');
});
