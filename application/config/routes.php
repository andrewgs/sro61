<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/*************************************************** USERS INTRERFACE ***********************************************/
$route[':any']			= "users_interface/index";
$route['news']			= "users_interface/news";


$route['application-energy-audit']				= "users_interface/application_energy_audit";
$route['application-passing-energy-performance']= "users_interface/application_passing_energy_performance";



$route['users/login']	= "users_interface/loginin";
$route['logoff']		= "users_interface/actions_logoff";

/************************************************** CLIENTS INTRERFACE ***********************************************/

$route['webmaster-panel/actions/control']	= "clients_interface/control_panel";
$route['webmaster-panel/actions/profile']	= "clients_interface/control_profile";
$route['webmaster-panel/actions/logoff']	= "clients_interface/actions_logoff";

/*************************************************** MAIN INTRERFACE *************************************************/

$route[':any/viewimage/:num']	= "general_interface/viewimage";

/*************************************************** ADMINS INTRERFACE ***********************************************/

$route['admin-panel/actions/control']	= "admin_interface/control_panel";
$route['admin-panel/actions/profile']	= "admin_interface/actions_profile";
$route['admin-panel/actions/logoff']	= "admin_interface/actions_logoff";