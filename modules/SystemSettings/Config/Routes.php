<?php
// User Routes
$routes->group('levels',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'Levels::index');
    $routes->match(['get', 'post'], 'a', 'Levels::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Levels::edit/$1');
    $routes->add('d/(:num)', 'Levels::delete/$1');
});
$routes->group('extensions',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'Extensions::index');
    $routes->match(['get', 'post'], 'a', 'Extensions::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Extensions::edit/$1');
    $routes->add('d/(:num)', 'Extensions::delete/$1');
});
$routes->group('organizationtypes',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'OrganizationTypes::index');
    $routes->match(['get', 'post'], 'a', 'OrganizationTypes::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'OrganizationTypes::edit/$1');
    $routes->add('d/(:num)', 'OrganizationTypes::delete/$1');
});
$routes->group('positions',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'Positions::index');
    $routes->match(['get', 'post'], 'a', 'Positions::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Positions::edit/$1');
    $routes->add('d/(:num)', 'Positions::delete/$1');
});
$routes->group('departments',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'Departments::index');
    $routes->match(['get', 'post'], 'a', 'Departments::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Departments::edit/$1');
    $routes->add('d/(:num)', 'Departments::delete/$1');
});
$routes->group('remarks',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'Remarks::index');
    $routes->match(['get', 'post'], 'a', 'Remarks::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Remarks::edit/$1');
    $routes->add('d/(:num)', 'Remarks::delete/$1');
});
$routes->group('eventtypes',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'EventTypes::index');
    $routes->match(['get', 'post'], 'a', 'EventTypes::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'EventTypes::edit/$1');
    $routes->add('d/(:num)', 'EventTypes::delete/$1');
});
$routes->group('facility-status',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'FacilityStatus::index');
    $routes->match(['get', 'post'], 'a', 'FacilityStatus::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'FacilityStatus::edit/$1');
    $routes->add('d/(:num)', 'FacilityStatus::delete/$1');
});
$routes->group('equipment-status',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'EquipmentStatus::index');
    $routes->match(['get', 'post'], 'a', 'EquipmentStatus::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'EquipmentStatus::edit/$1');
    $routes->add('d/(:num)', 'EquipmentStatus::delete/$1');
});
$routes->group('equipment-conditions',['namespace' => 'Modules\SystemSettings\Controllers'],function ($routes) {
    $routes->add('/', 'EquipmentConditions::index');
    $routes->match(['get', 'post'], 'a', 'EquipmentConditions::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'EquipmentConditions::edit/$1');
    $routes->add('d/(:num)', 'EquipmentConditions::delete/$1');
});
