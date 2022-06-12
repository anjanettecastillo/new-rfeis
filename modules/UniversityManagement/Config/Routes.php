<?php
$routes->group('courses', ['namespace' => 'Modules\UniversityManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Courses::index');
    $routes->match(['get', 'post'], 'a', 'Courses::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Courses::edit/$1');
    $routes->add('d/(:num)', 'Courses::delete/$1');
});
$routes->group('faculties', ['namespace' => 'Modules\UniversityManagement\Controllers'] ,function ($routes) {
    $routes->add('/', 'Faculties::index');
    $routes->match(['get', 'post'], 'a', 'Faculties::add');
    $routes->match(['get', 'post'], 'i', 'Faculties::import');
    $routes->match(['get', 'post'], 'u/(:num)', 'Faculties::edit/$1');
    $routes->add('d/(:num)', 'Faculties::delete/$1');
    $routes->add('v/(:num)', 'Faculties::view/$1');
});
$routes->group('students', ['namespace' => 'Modules\UniversityManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Students::index');
    $routes->match(['get', 'post'], 'a', 'Students::add');
    $routes->match(['get', 'post'], 'i', 'Students::import');
    $routes->match(['get', 'post'], 'u/(:num)', 'Students::edit/$1');
    $routes->add('d/(:num)', 'Students::delete/$1');
    $routes->add('v/(:num)', 'Students::view/$1');
});
$routes->group('organizations', ['namespace' => 'Modules\UniversityManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Organizations::index');
    $routes->match(['get', 'post'], 'a', 'Organizations::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Organizations::edit/$1');
    $routes->add('d/(:num)', 'Organizations::delete/$1');
});
$routes->group('officers', ['namespace' => 'Modules\UniversityManagement\Controllers'], function ($routes) {
    $routes->add('/', 'Officers::index');
    $routes->match(['get', 'post'], 'a', 'Officers::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Officers::edit/$1');
    $routes->add('d/(:num)', 'Officers::delete/$1');
});