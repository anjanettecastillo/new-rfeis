<?php
// User Routes
$routes->group('users',['namespace' => 'Modules\UserManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Users::index');
    $routes->match(['get', 'post'], 'a', 'Users::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Users::edit/$1');
    $routes->add('d/(:num)', 'Users::delete/$1');
    $routes->add('v/(:num)', 'Users::view/$1');
});
$routes->group('roles',['namespace' => 'Modules\UserManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Roles::index');
    $routes->match(['get', 'post'], 'a', 'Roles::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Roles::edit/$1');
    $routes->add('d/(:num)', 'Roles::delete/$1');
});
$routes->group('modules',['namespace' => 'Modules\UserManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Modules::index');
    $routes->match(['get', 'post'], 'a', 'Modules::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Modules::edit/$1');
    $routes->add('d/(:num)', 'Modules::delete/$1');
});
$routes->group('permissions',['namespace' => 'Modules\UserManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Permissions::index');
    $routes->match(['get', 'post'], 'a', 'Permissions::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'Permissions::edit/$1');
    $routes->add('d/(:num)', 'Permissions::delete/$1');
});
$routes->group('permission-types',['namespace' => 'Modules\UserManagement\Controllers'],function ($routes) {
    $routes->add('/', 'PermissionTypes::index');
    $routes->match(['get', 'post'], 'a', 'PermissionTypes::add');
    $routes->match(['get', 'post'], 'u/(:num)', 'PermissionTypes::edit/$1');
    $routes->add('d/(:num)', 'PermissionTypes::delete/$1');
});
$routes->group('roles-permissions',['namespace' => 'Modules\UserManagement\Controllers'],function ($routes) {
    $routes->add('/', 'RolesPermissions::index');
    $routes->match(['get', 'post'], 'u/(:num)', 'RolesPermissions::edit/$1');
    $routes->add('d/(:num)', 'RolesPermissions::delete/$1');
    $routes->add('r', 'RolesPermissions::retrieve');
});
