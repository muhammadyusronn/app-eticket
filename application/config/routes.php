<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['login']             = 'backend/AuthController/login';
$route['logout']            = 'backend/AuthController/logout';
$route['dash'] = 'backend/HomeController/index';
$route['knowledgebase'] = 'backend/KnowledgeBaseController/index';
$route['create-ticket'] = 'backend/TicketController/create';
$route['cancel-ticket'] = 'backend/TicketController/in_active_ticket';
$route['edit-ticket'] = 'backend/TicketController/detail';
$route['ticket'] = 'backend/TicketController/index';
$route['ticket/comment'] = 'backend/TicketController/comment';
$route['update-ticket-status'] = 'backend/TicketController/update_ticket_status';
// // Routing Admin
// $route['admin']                     = 'backend/AdminController/index';
// $route['admin/create']              = 'backend/AdminController/create';
// $route['admin/update/(:num)']       = 'backend/AdminController/edit/$1';
// // Routing Admin
// $route['level']                     = 'backend/LevelController/index';
// $route['level/create']              = 'backend/LevelController/create';
// $route['level/update/(:num)']       = 'backend/LevelController/edit/$1';


// // Routing Surat Keluar
// $route['pembangunan-jalan']                      = 'backend/JalanController/index';
// $route['pembangunan-jalan/create']               = 'backend/JalanController/create';
// $route['pembangunan-jalan/edit/(:num)']          = 'backend/JalanController/update/$1';
// $route['pembangunan-jalan/delete/(:any)']        = 'backend/JalanController/destroy/$1';


// $route['get-kelurahan-by-kecamatan/(:num)']       = 'backend/JalanController/get_kelurahan/$1';
// $route['get-grafik-tahun/(:num)']                 = 'backend/JalanController/get_grafik/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
