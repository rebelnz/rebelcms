<?php

return array(

			 'GET /admin, GET /admin/pages' => 
			 array('before' => 'auth', function()
				   {
					 $pages = Page::all();
	  
					 $view = View::of_admin_layout();
					 $view->content = View::make('admin.pages')
					   ->with('pages',$pages);
					 return $view;
				   }),


			 'GET /admin/media' => 
			 array('before' => 'auth', function()
				   {
					 $files = Media::all();
					 
					 $view = View::of_admin_layout();
					 $view->content = View::make('admin.media')
					   ->with('files',$files);
					 return $view;
				   }),


			 'GET /admin/users' => 
			 array('before' => 'auth', function()
				   {
					 $users = User::all();
					 
					 $view = View::of_admin_layout();
					 $view->content = View::make('admin.users')
					   ->with('users',$users);
					 return $view;
				   }),
			 

			 'GET /admin/newpage/(:num?)' => 
			 array('before' => 'auth', function($pageid=NULL)
				   {
					 if ( $pageid )
					   {
						 $page = Page::find($pageid);
					   }
					 
					 $view = View::of_admin_layout();
					 $view->content = View::make('admin.newpage')
					   ->with('page',$page);
					 return $view;
				   }),


			 'GET /admin/newmedia' => 
			 array('before' => 'auth', function()
				   {
					 $view = View::of_admin_layout();
					 $view->content = View::make('admin.newmedia');
					 return $view;
				   }),

			 'GET /admin/newuser' => 
			 array('before' => 'auth', function()
				   {
					 $roleoptions = array('admin'=>'Admin','edit'=>'Editor');
					 
					 $view = View::of_admin_layout();
					 $view->content = View::make('admin.newuser')
					   ->with('roleoptions',$roleoptions);
					 return $view;
				   }),
			 

			 'GET /admin/deleteuser/(:num?)' => 
			 array('before' => 'auth', function($userid=NULL)
				   {	  
					 $user = User::find($userid);
					 $user->delete();
					 return Redirect::to('admin/pages');		
				   }),
			 

			 'GET /admin/deletepage/(:num?)' => 
			 array('before' => 'auth', function($pageid=NULL)
				   {	  
					 DB::table('pages')->delete($pageid);	  
					 
					 DB::table('pages_media')
					   ->where('page_id','=',$pageid)
					   ->delete();
					 
					 return Redirect::to('admin/pages');		
				   }),


			 'GET /admin/deletemedia/(:num?)' => 
			 array('before' => 'auth', function($mediaid=NULL)
				   {	  
					 $media = Media::find($mediaid);
	  
					 unlink('img/' . $media->filename);
					 unlink('img/medium_' . $media->filename);
					 unlink('img/thumb_' . $media->filename);
	  
					 DB::table('media')->delete($mediaid);

					 DB::table('pages_media')
					   ->where('media_id','=',$mediaid)
					   ->delete();

					 return Redirect::to('admin/media');		
				   }),


			 'GET /admin/publish/(:num?)/(:num?)' =>
			 array('before' => 'auth', function($pageid=NULL,$pub=NULL)
				   {
					 $page = Page::find($pageid);
					 $page->publish = $pub;
					 $page->save();	  
					 return Redirect::to('admin/pages');		
				   }),

			 

			 'GET /admin/editmedia/(:num?)' => 
			 array('before' => 'auth', function($mediaid=NULL)
				   {
					 $media = Media::find($mediaid);
					 $pages = DB::table('pages')
					   ->get(array('title','slug','id'));
					 
					 $currentpage = DB::table('pages_media')
					   ->where('media_id','=',$mediaid)
					   ->get('page_id');
					 
					 $options = array();
					 
					 foreach ($pages as $page)
					   {
						 $options[$page->id] = $page->title;
					   }	  
					 $options['0'] = 'None';

					 $view = View::of_admin_layout();
					 $view->content = View::make('admin.editmedia')
					   ->with('media',$media)
					   ->with('currentpage',$currentpage)
					   ->with('options',$options);
					 return $view;
				   }),	


			 'GET /admin/edituser/(:num?)' => 
			 array('before' => 'auth', function($userid=NULL)
				   {

					 $user = User::find($userid);

					 $roleoptions = array('admin'=>'Admin','edit'=>'Editor');

					 $view = View::of_admin_layout();
					 $view->content = View::make('admin.edituser')
					   ->with('user',$user)
					   ->with('roleoptions',$roleoptions);
					 return $view;
				   }),	


			 'GET /admin/resetpw/(:num?)' =>
			 array('before' => 'auth', function($userid=NULL)
				   {
					 $user = User::find($userid);
					 $newpw = Str::random(8);

					 $to      = $user->email;
					 $subject = 'Password Reset';
					 $message = $newpw;
					 $headers = 'From: webmaster@example.com' . "\r\n" .
					   'Reply-To: webmaster@example.com' . "\r\n" .
					   'X-Mailer: PHP/' . phpversion();

					 mail($to, $subject, $message, $headers);
			
					 $user->password = Hash::make($newpw);
					 $user->save();
					 return Redirect::to('admin/users');							 
				   }),


			 'POST /admin/editmedia' => 
			 array('before' => 'auth',function()
				   {
					 $media_id = Input::get('mediaid');
					 $page_id = Input::get('page');
		  
					 $media = Media::find($media_id);
					 $media->caption = Input::get('caption');
					 $media->meta = Input::get('meta');
					 $media->size = Input::get('size');
					 $media->save();

					 DB::table('pages_media')->where('media_id','=',$media_id)
					   ->delete();

					 DB::table('pages_media')->insert(array('media_id'=>$media_id,
															'page_id'=>$page_id));
				 
					 return Redirect::to('admin/media');
				 
				   }),


			 'POST /admin/edituser' => 
			 array('before' => 'auth',function()
				   {
					 $user_id = Input::get('userid');
					 
					 $rules = array(
									'firstname' => 'required|max:140',
									'lastname' => 'required|max:140',
									'email' => 'required|max:50',
									'role' => 'required',
									);				 
					 
					 $validator = Validator::make(Input::get(), $rules);
					 
					 if ( ! $validator->valid())
					   {
						 return Redirect::to('admin/edituser/' . $user_id )
						   ->with('errors', $validator->errors)
						   ->with_input();
					   }
		  
					 $user = User::find($user_id);
					 $user->firstname = Input::get('firstname');
					 $user->lastname = Input::get('lastname');
					 $user->email = Input::get('email');
					 $user->role = Input::get('role');
					 $user->save();
				 
					 return Redirect::to('admin/users');
				 
				   }),


			 'POST /admin/newpage/(:any?)' => 
			 array('before' => 'auth', function()
				   {
					 $rules = array(
									'slug' => 'required',
									'title' => 'required',
									);
					 
					 $validator = Validator::make(Input::all(), $rules);
					 
					 if ( $validator->invalid())		
					   {
						 return Redirect::to('admin/newpage')
						   ->with_errors($validator);
					   }
	  
					 $slug = Input::get('slug');
					 $slug = URL::slug($slug);//make url friendly
	  
					 if ( Input::get('pageid') ) {
					   $page = Page::find(Input::get('pageid'));		  
					 }
					 else {  
					   $page = new Page;				 
					 }

					 $page->slug = $slug;
					 $page->title = Input::get('title');
					 $page->summary = Input::get('summary');
					 $page->content = Input::get('content');
					 $page->publish = Input::get('publish');
		
					 $page->save();
	  
					 return Redirect::to('admin/pages');
				   }),


			 'POST /admin/newmedia' => 
			 array('before' => 'auth', function()
				   {
	  
					 $imagename = time() . Input::file('image.name');
	  
					 File::upload('image', PUBLIC_PATH . 'img/' . $imagename);
	  
					 $newimage = PUBLIC_PATH . 'img/' . $imagename;

					 $image = new Imagick($newimage);	  

					 $image->scaleImage(400,0);
					 $image->writeImage(PUBLIC_PATH . 'img/medium_' . $imagename);	  

					 $image->resizeImage(80,80,Imagick::FILTER_LANCZOS,1,TRUE);
					 $image->writeImage(PUBLIC_PATH . 'img/thumb_' . $imagename);	  
	  	  
					 $image->destroy(); 

					 $media = new Media;
					 $media->filename = $imagename;
					 $media->caption = Input::get('caption');
					 $media->meta = Input::get('meta');
					 $media->save();
	  
					 return Redirect::to('admin/media');
				   }),

	
			 'POST /admin/newuser' => 
			 array('before' => 'auth', function()
				   {	
		
					 $rules = array(
									'firstname' => 'required|max:140',
									'lastname' => 'required|max:140',
									'email' => 'required|max:50|unique:users',
									'role' => 'required',
									'password' => 'required|max:50|between:6,16|confirmed'
									);				 
		
					 $validator = Validator::make(Input::get(), $rules);
		
					 if ( ! $validator->valid())
					   {
						 return Redirect::to('admin/newuser')
						   ->with('errors', $validator->errors)
						   ->with_input('except', array('password','password_confirmation'));
					   }
		
					 $user = new User;				 
				 
					 $user->fill(array(
									   'firstname'   => Input::get('firstname'),
									   'lastname'    => Input::get('lastname'),
									   'email'		=> Input::get('email'),
									   'role'		=> Input::get('role'),
									   'password'    => Hash::make(Input::get('password'))
									   )
								 );
		
					 $user->save();
					 return Redirect::to('admin');					 	 
			   
				   }),

			 );