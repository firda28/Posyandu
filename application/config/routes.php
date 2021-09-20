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
|	https://codeigniter.com/user_guide/general/routing.html
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
//PAGE
$route['default_controller'] = 'C_body';
$route['admin'] = 'C_body/redirect';
$route['admin/dashboard'] = 'C_body';

//login 
$route['auth/login'] = 'C_auth';
$route['auth/logout'] = 'C_auth/logout';

$route['admin/posyanduu'] = 'C_posyandu/index';
$route['admin/posyanduu/add'] = 'C_posyandu/ack_add';
$route['admin/posyanduu/view/(.*)'] = 'C_posyandu/ack_view/$1';
$route['admin/posyanduu/update'] = 'C_posyandu/ack_update';
$route['admin/posyanduu/delete'] = 'C_posyandu/ack_delete';
$route['posyanduu/search'] = 'C_posyandu/search';

$route['admin/kader'] = 'C_kader';
$route['admin/kader/add'] = 'C_kader/ack_add';
$route['admin/kader/view/(.*)'] = 'C_kader/ack_view/$1';
$route['admin/kader/update'] = 'C_kader/ack_update';
$route['admin/kader/delete'] = 'C_kader/ack_delete';

$route['admin/imunisasi'] = 'C_imunisasi/index';
$route['admin/imunisasi/add'] = 'C_imunisasi/ack_add';
$route['admin/imunisasi/view/(.*)'] = 'C_imunisasi/ack_view/$1';
$route['admin/imunisasi/update'] = 'C_imunisasi/ack_update';
$route['admin/imunisasi/delete'] = 'C_imunisasi/ack_delete';

$route['admin/status_gizi'] = 'C_status_gizi/index';
$route['admin/status_gizi/add'] = 'C_status_gizi/ack_add';
$route['admin/status_gizi/view/(.*)'] = 'C_status_gizi/ack_view/$1';
$route['admin/status_gizi/update'] = 'C_status_gizi/ack_update';
$route['admin/status_gizi/delete'] = 'C_status_gizi/ack_delete';

$route['admin/kelainan'] = 'C_kelainan/index';
$route['admin/kelainan/add'] = 'C_kelainan/ack_add';
$route['admin/kelainan/view/(.*)'] = 'C_kelainan/ack_view/$1';
$route['admin/kelainan/update'] = 'C_kelainan/ack_update';
$route['admin/kelainan/delete'] = 'C_kelainan/ack_delete';

$route['status'] = 'C_public/getPosyanduLike';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
