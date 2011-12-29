<?php 

$navitems = DB::table('pages')->where('publish','=',1)
  ->get(array('title','slug'));

echo '<div class="topbar">';
echo '<div class="fill">';

echo '<div class="container">';

echo '<a class="brand" href="#">Rebel Cms</a>';

echo '<ul class="nav">'; 

echo '<li>';
echo HTML::link('/','Home');
echo '</li>';

foreach ( $navitems as $item )
  {
	echo '<li>';
	echo HTML::link('/' . $item->slug, $item->title);
	echo '</li>';
  }
echo '<li>';
echo HTML::link('/admin','Admin');
echo '</li>';

echo '</ul>';


echo '</div>';
echo '</div>';
echo '</div>';


?>