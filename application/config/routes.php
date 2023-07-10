<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['frontent/demowebsite/view/(:any)'] = 'frontent/demowebsite/view/$1';
$route['code-(:any)'] = 'frontent/code_run/add/$1';
$route['codeshow'] = 'frontent/code_run/show_code';
$route['coderun-(:any)'] = 'frontent/code_run/view/$1';
// coderun-RunhBjnPagc5ZwVdsTYQE87ofAp6WmUDk3rCNeI0
// Cấu hình backend
$route['admin'] = 'backend/user/login';
$route['backend/news/category'] = 'backend/news/category';
$route['backend/user/login'] = 'backend/user/login';
$route['backend/setup/get_image'] = 'backend/setup/get_image';
$route['backend/main/dashboard'] = 'backend/main/dashboard';
$route['backend/setup/menu'] = 'backend/setup/menu';
$route['backend/setup/contact'] = 'backend/setup/contact';
$route['backend/setup/feedback'] = 'backend/setup/feedback';
$route['backend/setup/comment'] = 'backend/setup/comment';



// $route['(:any)'] = 'frontent/posts/category';
$route['(:any)/(:any)'] = 'frontent/category';
$route['(:any)/(:any)/(:any)'] = 'frontent/post';
$route['translate_uri_dashes'] = FALSE;
