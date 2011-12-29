<?php

return array(

	'GET /' => function()
	{
	  $view = View::of_site_layout();
	  $view->content = View::make('site.home');
	  return $view;
	},


	'GET /(:any?)' => function($slug=NULL)
	{
	  $page = Page::where('slug','=',$slug)->first();

	  if ( ! $page ) {
		return Redirect::to('/');		
	  }

	  $media = Page::find($page->id)->media;
	  
	  $view = View::of_site_layout();
	  $view->content = View::make('site.page')
		->with('media',$media)
		->with('page',$page);
	  return $view;
	},

	'GET /login' => function($slug=NULL)
	{
	  
	  $view = View::of_site_layout();
	  $view->content = View::make('site.login');
	  return $view;
	},


	'POST /login' => function()
	  {
		if (Auth::attempt(Input::get('email'), Input::get('password')))
		  {
			return Redirect::to('admin');
		  }
		
		return Redirect::to('login')->with('error', 'The credentials you provided are invalid.');
	  },

	'GET /logout' => function()
	  {
		Auth::logout();
		return Redirect::to('/');
	  },

);