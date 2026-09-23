<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public Routes
$routes->get('/', 'Home::index');
$routes->get('/menu', 'Menu::index');
$routes->get('/menu/(:num)', 'Menu::detail/$1');

// Auth Routes
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

// Admin Routes (Protected by Auth Filter)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin\AdminMenu::index');
    $routes->get('create', 'Admin\AdminMenu::create');
    $routes->post('store', 'Admin\AdminMenu::store');
    $routes->get('edit/(:num)', 'Admin\AdminMenu::edit/$1');
    $routes->post('update/(:num)', 'Admin\AdminMenu::update/$1');
    $routes->get('delete/(:num)', 'Admin\AdminMenu::delete/$1');
    $routes->post('delete/(:num)', 'Admin\AdminMenu::delete/$1');
});
