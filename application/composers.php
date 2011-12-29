<?php

return array(

	'layouts.admin.default' => array('name' => 'admin_layout', function($view)
	{
	  Asset::script('jquery','js/jquery-1.7.1.js');
	  Asset::script('twipsy','js/twipsy.js'); 
	  Asset::script('admin','js/admin.js'); 

	  Asset::style('bootstrap','css/bootstrap.css'); 
	  Asset::style('admin','css/admin.css'); 

	  $view->nest('header','partials.header'); 
	  $view->nest('footer','partials.footer');
	}),

	'layouts.site.default' => array('name' => 'site_layout', function($view)
	{
	  Asset::script('jquery','js/jquery-1.7.1.js');
	  Asset::script('site','js/site.js');

	  Asset::style('bootstrap','css/bootstrap.css'); 
	  Asset::style('site','css/site.css'); 

	  $view->nest('header','partials.header'); 
	  $view->nest('nav','partials.nav'); 
	  $view->nest('footer','partials.footer');
	}),

);