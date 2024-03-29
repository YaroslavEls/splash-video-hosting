<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'MainController');

$routes->get('/compilations', 'CompilationController');
$routes->get('/compilations/search/(:any)', 'CompilationController::search/$1');

$routes->get('/filters', 'FilterController::index');
$routes->get('/filters/(:any)', 'FilterController::tag/$1');
$routes->get('/compilations/(:num)', 'FilterController::compilation/$1');
$routes->get('/search/(:any)', 'FilterController::search/$1');

$routes->get('/watch/(:segment)', 'WatchController::index/$1');
$routes->post('/watch/(:segment)', 'WatchController::comment/$1');
// $routes->get('/watch/(:any)/episode/(:num)', 'WatchController::episode/$1/$2');

$routes->get('/login', 'LoginController');
$routes->post('/login', 'LoginController::auth');
$routes->get('/registration', 'RegistrationController');
$routes->post('/registration', 'RegistrationController::auth');
$routes->get('/exit', 'LoginController::exit');

$routes->get('/user/(:num)', 'UserController::index/$1');
$routes->get('/user/(:num)/friends', 'UserController::friends/$1');
    $routes->post('/create', 'UserController::create');
    $routes->post('/add', 'UserController::add');

$routes->get('/user/(:num)/invite', 'FriendController::invite/$1');
$routes->get('/user/(:num)/cancel', 'FriendController::cancel/$1');
$routes->get('/user/(:num)/accept', 'FriendController::accept/$1');
$routes->get('/user/(:num)/decline', 'FriendController::decline/$1');
$routes->get('/user/(:num)/remove', 'FriendController::remove/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
