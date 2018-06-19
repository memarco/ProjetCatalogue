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
$route['site/index/(:any)'] = 'site/index/$1';

$route['site/edit/(:any)'] = 'site/edit/$1';
$route['site/delete/(:any)'] = 'site/delete/$1';

$route['site/view/(:any)'] = 'site/view/$1';
$route['site/(:any)'] = 'site/view/$1';

/* composante routes  */
$route['composante'] = 'composante';
$route['composante/create'] = 'composante/create';
$route['composante/index/(:any)'] = 'composante/index/$1';

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
$route['filiere/index'] = 'filiere/index';
$route['filiere/index/(:any)'] = 'filiere/index/$1';

$route['filiere/edit/(:any)'] = 'filiere/edit/$1';
$route['filiere/delete/(:any)'] = 'filiere/delete/$1';

$route['filiere/view/(:any)'] = 'filiere/view/$1';
$route['filiere/(:any)'] = 'filiere/view/$1';

/* filiere niveau  */
$route['niveau'] = 'niveau';
$route['niveau/create'] = 'niveau/create';
$route['niveau/index/(:any)'] = 'niveau/index/$1';
$route['niveau/edit/(:any)'] = 'niveau/edit/$1';
$route['niveau/delete/(:any)'] = 'niveau/delete/$1';

$route['niveau/view/(:any)'] = 'niveau/view/$1';
$route['niveau/(:any)'] = 'niveau/view/$1';
$route['niveau/index'] = 'niveau/index/$1';

/* filiere diplome  */
$route['diplome'] = 'diplome';
$route['diplome/create'] = 'diplome/create';
$route['diplome/index/(:any)'] = 'diplome/index/$1';
$route['diplome/index'] = 'diplome/index/$1';

$route['diplome/edit/(:any)'] = 'diplome/edit/$1';
$route['diplome/delete/(:any)'] = 'diplome/delete/$1';

$route['diplome/view/(:any)'] = 'diplome/view/$1';
$route['diplome/(:any)'] = 'diplome/view/$1';

/* filiere formation  */
$route['formation'] = 'formation';
$route['formation/index'] = 'formation/index';
$route['formation/create'] = 'formation/create';
$route['formation/search'] = 'formation/search';
$route['formation/index/(:any)'] = 'formation/index/$1';

$route['formation/edit/(:any)'] = 'formation/edit/$1';
$route['formation/duplicate/(:any)'] = 'formation/duplicate/$1';
$route['formation/delete/(:any)'] = 'formation/delete/$1';

$route['formation/view/(:any)'] = 'formation/view/$1';
$route['formation/(:any)'] = 'formation/view/$1';
$route['formation/get_formation'] = 'formation/get_formation';

/* type_periode routes  */
$route['type_periode'] = 'type_periode';
$route['type_periode/create'] = 'type_periode/create';

$route['type_periode/edit/(:any)'] = 'type_periode/edit/$1';
$route['type_periode/delete/(:any)'] = 'type_periode/delete/$1';

$route['type_periode/view/(:any)'] = 'type_periode/view/$1';
$route['type_periode/(:any)'] = 'type_periode/view/$1';

/* type_stage routes  */
$route['type_stage'] = 'type_stage';
$route['type_stage/create'] = 'type_stage/create';

$route['type_stage/edit/(:any)'] = 'type_stage/edit/$1';
$route['type_stage/delete/(:any)'] = 'type_stage/delete/$1';

$route['type_stage/view/(:any)'] = 'type_stage/view/$1';
$route['type_stage/(:any)'] = 'type_stage/view/$1';

$route['public'] = 'modules/public/view';
$route['formation_ajax'] = 'formation_ajax';

$route['formation/filierebydomaine'] = 'formation/filierebydomaine';


$route['editor/(:any)'] = 'editor/index/$1';

$route['formation/get_formation_by_id'] = 'formation/get_formation_by_id';

$route['ajax_search_view'] = 'search';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
