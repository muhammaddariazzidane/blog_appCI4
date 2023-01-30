<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/detail/(:num)', 'Home::show/$1');
$routes->resource('posts', ['controller' => 'PostController']);

// views
$routes->get('/login', 'LoginController::index');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/register', 'RegisterController::index');
// auth
$routes->post('/login', 'LoginController::auth');
$routes->post('/register', 'RegisterController::store');
// dashboard
$routes->get('/dashboard', 'DashboardController::index');
// admin
$routes->group('dashboard', ['filter' => 'is_admin'],  function ($routes) {
    $routes->get('users', 'DashboardController::UserLists');
    $routes->delete('users/(:num)', 'DashboardController::deleteUser/$1');

    // category
    $routes->get('categories', 'DashboardController::CategoryLists');
    $routes->post('categories', 'DashboardController::storeCategory');
    $routes->delete('categories/(:num)', 'DashboardController::deleteCategory/$1');
    $routes->get('categories/(:num)', 'DashboardController::editCategory/$1');
    $routes->post('categories/(:num)', 'DashboardController::updateCategory/$1');
});
// $routes->get('/dashboard/categories', 'DashboardController::CategoryLists', ['filter' => 'is_admin']);
// $routes->post('/dashboard/categories', 'DashboardController::storeCategory');
// $routes->delete('/dashboard/categories/(:num)', 'DashboardController::deleteCategory/$1');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
