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


//  TODO: Login Routers
$routes->get('/', 'Home::re_route');
$routes->get('/babinsa', 'Home::babinsa', ['filter' => 'role:admin,leader']);
$routes->get('/member', 'Home::member', ['filter' => 'role:member']);

// TODO: Babinsa CRUD
$routes->get('/babinsa/add', 'Babinsa::add', ['filter' => 'role:admin']);
$routes->get('/babinsa/edit/(:num)', 'Babinsa::edit/$1', ['filter' => 'role:admin']);
$routes->post('/babinsa/update/(:num)', 'Babinsa::update/$1', ['filter' => 'role:admin']);
$routes->get('/babinsa/delete/(:num)', 'Babinsa::delete/$1', ['filter' => 'role:admin']);

// TODO: Piket CRUD
$routes->get('/piket', 'Home::piket', ['filter' => 'role:admin,leader']);
$routes->get('/piket/add', 'Piket::add', ['filter' => 'role:admin']);
$routes->post('/piket/create', 'Piket::create', ['filter' => 'role:admin']);
$routes->get('/piket/edit/(:num)', 'Piket::edit/$1', ['filter' => 'role:admin']);
$routes->post('/piket/update/(:num)', 'Piket::update/$1', ['filter' => 'role:admin']);

// TODO: Detail Laporan
$routes->get('/piket/laporan/(:num)', 'Piket::laporan/$1', ['filter' => 'role:admin,leader']);
$routes->get('/piket/laporan/lampiran/download/(:num)', 'Piket::download_lampiran/$1', ['filter' => 'role:admin,leader']);

// TODO: Member Routes
$routes->get('member/piket/laporan/(:num)', 'Member::laporan/$1', ['filter' => 'role:member']);

// TODO: CRUD Laporan
$routes->get('member/piket/laporan/add/(:num)', 'Member::laporan_add/$1', ['filter' => 'role:member']);
$routes->post('member/piket/laporan/create/(:num)', 'Member::laporan_create/$1', ['filter' => 'role:member']);
$routes->get('member/piket/laporan/edit/(:num)', 'Member::laporan_edit/$1', ['filter' => 'role:member']);
$routes->post('member/piket/laporan/update/(:num)', 'Member::laporan_update/$1', ['filter' => 'role:member']);

// TODO: CRUD Lampiran
$routes->get('member/piket/lampiran/add/(:num)', 'Member::lampiran_add/$1', ['filter' => 'role:member']);
$routes->post('member/piket/lampiran/create/(:num)', 'Member::lampiran_create/$1', ['filter' => 'role:member']);
$routes->get('member/piket/lampiran/edit/(:num)/(:num)', 'Member::lampiran_edit/$1/$2', ['filter' => 'role:member']);
$routes->post('member/piket/lampiran/update/(:num)/(:num)', 'Member::lampiran_update/$1/$2', ['filter' => 'role:member']);
$routes->get('member/piket/lampiran/delete/(:num)/(:num)', 'Member::lampiran_delete/$1/$2', ['filter' => 'role:member']);





if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
