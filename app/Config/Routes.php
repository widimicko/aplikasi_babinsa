<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);



// We get a performance increase by specifying the default
// route since we don't have to scan directories.


//  TODO: Admin Routers
$routes->get('/', 'Home::index', ['filter' => 'role:admin']);
$routes->get('/admin', 'Home::index', ['filter' => 'role:admin']);

$routes->get('/babinsa', 'Home::index', ['filter' => 'role:admin,leader']);

// TODO: Babinsa CRUD
$routes->get('/babinsa/add', 'Babinsa::add', ['filter' => 'role:admin']);
$routes->get('/babinsa/edit/(:num)', 'Babinsa::edit/$1', ['filter' => 'role:admin']);
$routes->post('/babinsa/update/(:num)', 'Babinsa::update/$1', ['filter' => 'role:admin']);
$routes->get('/babinsa/delete/(:num)', 'Babinsa::delete/$1', ['filter' => 'role:admin']);

// TODO: Piket CRUD
$routes->get('/piket', 'Home::piket', ['filter' => 'role:admin']);



$routes->get('/leader', 'Admin::index', ['filter' => 'role:leader']);


$routes->get('/member', 'Admin::index', ['filter' => 'role:member']);



if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
