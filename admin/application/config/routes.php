<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = '';

/* site routes  */
$route['site'] = 'site';
$route['site/create'] = 'site/create';
 
$route['site/edit/(:any)'] = 'site/edit/$1';
$route['site/delete/(:any)'] = 'site/delete/$1';
 
$route['site/view/(:any)'] = 'site/view/$1';
$route['site/(:any)'] = 'site/view/$1';

/* composante routes  */
$route['composante'] = 'composante';
$route['composante/create'] = 'composante/create';
 
$route['composante/edit/(:any)'] = 'composante/edit/$1';
$route['composante/delete/(:any)'] = 'composante/delete/$1';
 
$route['composante/view/(:any)'] = 'composante/view/$1';
$route['composante/(:any)'] = 'composante/view/$1';

/* domaine routes  */
$route['domaine'] = 'domaine';
$route['domaine/create'] = 'domaine/create';
$route['domaine/index/(:any)'] = 'domaine/index/$1';

$route['domaine/edit/(:any)'] = 'domaine/edit/$1';
$route['domaine/delete/(:any)'] = 'domaine/delete/$1';

$route['domaine/view/(:any)'] = 'domaine/view/$1';
$route['domaine/(:any)'] = 'domaine/view/$1';

/* type_formation routes  */
$route['type_formation'] = 'type_formation';
$route['type_formation/create'] = 'type_formation/create';
 
$route['type_formation/edit/(:any)'] = 'type_formation/edit/$1';
$route['type_formation/delete/(:any)'] = 'type_formation/delete/$1';
 
$route['type_formation/view/(:any)'] = 'type_formation/view/$1';
$route['type_formation/(:any)'] = 'type_formation/view/$1';

/* filiere routes  */
$route['filiere'] = 'filiere';
$route['filiere/create'] = 'filiere/create';
 
$route['filiere/edit/(:any)'] = 'filiere/edit/$1';
$route['filiere/delete/(:any)'] = 'filiere/delete/$1';
 
$route['filiere/view/(:any)'] = 'filiere/view/$1';
$route['filiere/(:any)'] = 'filiere/view/$1';

/* filiere niveau  */
$route['niveau'] = 'niveau';
$route['niveau/create'] = 'niveau/create';
 
$route['niveau/edit/(:any)'] = 'niveau/edit/$1';
$route['niveau/delete/(:any)'] = 'niveau/delete/$1';
 
$route['niveau/view/(:any)'] = 'niveau/view/$1';
$route['niveau/(:any)'] = 'niveau/view/$1';

/* filiere diplome  */
$route['diplome'] = 'diplome';
$route['diplome/create'] = 'diplome/create';
 
$route['diplome/edit/(:any)'] = 'diplome/edit/$1';
$route['diplome/delete/(:any)'] = 'diplome/delete/$1';
 
$route['diplome/view/(:any)'] = 'diplome/view/$1';
$route['diplome/(:any)'] = 'diplome/view/$1';

/* filiere formation  */
$route['formation'] = 'formation';
$route['formation/create'] = 'formation/create';
$route['formation/index/(:any)'] = 'formation/index/$1';
 
$route['formation/edit/(:any)'] = 'formation/edit/$1';
$route['formation/delete/(:any)'] = 'formation/delete/$1';
 
$route['formation/view/(:any)'] = 'formation/view/$1';
$route['formation/(:any)'] = 'formation/view/$1'; 

$route['public'] = 'modules/public/view';
/* End of file routes.php */
/* Location: ./application/config/routes.php */