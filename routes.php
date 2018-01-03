<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'root';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

## This Added
$route['sitemap\.xml'] = "sess/sitemap";
