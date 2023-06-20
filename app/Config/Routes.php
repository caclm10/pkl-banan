<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();


function createAdminRoutes($name, $prefix = '')
{
    $routes = Services::routes();

    $controller = "Admin\\" . str_replace('-', '', ucwords($name, '-'));

    $prefix = "admin" . ($prefix ? '/' . $prefix : '');

    $routes->get("{$prefix}/{$name}", $controller . "::index");
    $routes->get("{$prefix}/{$name}/create", $controller . "::create");
    $routes->post("{$prefix}/{$name}", $controller . "::store");
    $routes->get("{$prefix}/{$name}/(:num)/edit", $controller . "::edit/$1");
    $routes->put("{$prefix}/{$name}/(:num)", $controller . "::update/$1");
    $routes->delete("{$prefix}/{$name}/(:num)", $controller . "::destroy/$1");
}

function createAdminChildRoutes($parentName, $name, $prefix = '', $onlyStore = false)
{
    $routes = Services::routes();

    $controller = "Admin\\" . str_replace('-', '', ucwords("{$name}-{$parentName}", '-'));

    $prefix = "admin" . ($prefix ? '/' . $prefix : '');

    $routes->get("{$prefix}/{$parentName}/(:num)/{$name}", $controller . "::index/$1");
    $routes->post("{$prefix}/{$parentName}/(:num)/{$name}", $controller . "::store/$1");
    $routes->delete("{$prefix}/{$parentName}/(:num)/{$name}/(:num)", $controller . "::destroy/$1/$2");

    if (!$onlyStore) {
        $routes->put("{$prefix}/{$parentName}/(:num)/{$name}", $controller . "::update/$1");
    }
}

function createSingleAdminRoutes($name, $prefix = '')
{
    $routes = Services::routes();

    $controller = "Admin\\" . str_replace('-', '', ucwords($name, '-'));

    $prefix = "admin" . ($prefix ? '/' . $prefix : '');

    $routes->get("{$prefix}/{$name}", $controller . '::index');
    $routes->put("{$prefix}/{$name}", $controller . '::update');
}


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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/tentang-kami', 'TentangKami::index');
$routes->get('/proyek/(:num)', 'Proyek::index/$1');
$routes->get('/proyek', 'Proyek::index');
$routes->get('/pengumuman', 'Pengumuman::index');
$routes->get('/kontak', 'Kontak::index');

$routes->get('login', 'Auth::loginView');
$routes->post('login', 'Auth::login');
$routes->post('logout', 'Auth::logout');

$routes->addRedirect("/admin", "/admin/dashboard");

$routes->get('admin/dashboard', 'Admin\Dashboard::index');

createSingleAdminRoutes('akun');
createSingleAdminRoutes('password', 'akun');

createAdminRoutes('pengumuman');

createAdminRoutes('proyek');

createAdminRoutes("admin");

createAdminRoutes("tim");

createAdminRoutes("pekerja-tambahan");

createAdminChildRoutes('proyek', 'gambar');

createAdminChildRoutes('proyek', 'pekerja', '', true);

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
