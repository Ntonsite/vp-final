<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/index';
$route['users'] = 'engine/index';
$route['restricted'] = 'auth/restrict';
$route['audit'] = 'audit/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
