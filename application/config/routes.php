<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/************************************************** USERS INTRERFACE ***********************************************/

$route['cabinet/orders']			= "clients_interface/available_orders";
$route['cabinet/orders/from']		= "clients_interface/available_orders";
$route['cabinet/orders/from/:num']	= "clients_interface/available_orders";

/*************************************************** ADMINS INTRERFACE ***********************************************/

$route['admin-panel/actions/orders']			= "admin_interface/available_orders";
$route['admin-panel/actions/orders/from']		= "admin_interface/available_orders";
$route['admin-panel/actions/orders/from/:num']	= "admin_interface/available_orders";

$route['admin-panel/actions/orders/delete/id/:num']= "admin_interface/delete_order";
$route['admin-panel/actions/orders/closed/id/:num']= "admin_interface/closed_order";

$route['admin-panel/actions/users']					= "admin_interface/actions_users";
$route['admin-panel/actions/users/from']			= "admin_interface/actions_users";
$route['admin-panel/actions/users/from/:num']		= "admin_interface/actions_users";

$route['admin-panel/actions/users/add']				= "admin_interface/user_add";
$route['admin-panel/actions/users/delete/id/:num']	= "admin_interface/user_delete";

$route['admin-panel/actions/profile']	= "admin_interface/actions_profile";

/*************************************************** USERS INTRERFACE ***********************************************/
$route['news']			= "users_interface/news";

$route['send-order']	= "users_interface/send_order";

$route['application-energy-audit']				= "users_interface/application_energy_audit";
$route['application-passing-energy-performance']= "users_interface/application_passing_energy_performance";

$route['users/login']	= "users_interface/loginin";
$route['logoff']		= "users_interface/actions_logoff";
$route[':any']			= "users_interface/index";