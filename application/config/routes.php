<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']            = 'Authentication';
$route['logout']                        = 'logout';
$route['auth']                          = 'Authentication';
$route['forgot']                        = 'Authentication/forgot';
$route['forgotpasssword/(:any)/(:any)'] = 'Authentication/forgotpasssword/$1/$2';

$route['dashboard']                     = 'Admin_dashboard';


//DATA DEPARTEMENT
$route['departement']                    = 'Admin_departement';
$route['departement/add']                = 'Admin_departement/create';
$route['departement/delete/(:any)']      = 'Admin_departement/delete/$1';
$route['departement/edit/(:any)']        = 'Admin_departement/update/$1';

//DATA USER ROLE
$route['role']                          = 'Admin_user_role';
$route['role/add']                      = 'Admin_user_role/create';
$route['role/delete/(:any)']            = 'Admin_user_role/delete/$1';
$route['role/edit/(:any)']              = 'Admin_user_role/update/$1';

//DATA UNIT
$route['unit']                          = 'Admin_unit';
$route['unit/add']                      = 'Admin_unit/create';
$route['unit/delete/(:any)']            = 'Admin_unit/delete/$1';
$route['unit/edit/(:any)']              = 'Admin_unit/update/$1';


$route['testing']                       = 'Authentication/sendemail';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
