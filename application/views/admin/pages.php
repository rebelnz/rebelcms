<?php 
echo '<div class="row">';

echo '<div class="span6">';

foreach ( $pages as $page )
  {	
	if ( $page->publish == 1 ) { 
	  echo '<div class="alert-message block-message success">';
	}
	else {
	  echo '<div class="alert-message block-message warning">';	  
	}
	echo '<h4>';
	echo HTML::link('/' . $page->slug,$page->title);
	echo '<h4>';

	echo '<div class="alert-actions">';
	echo HTML::link('admin/newpage/' . $page->id,'Edit this Page',array('class'=>'btn small'));
	echo ' ';
	echo HTML::link('admin/deletepage/' . $page->id,'Delete this Page',array('class'=>'btn small'));
	echo ' ';
	echo $page->publish ? 
	  HTML::link('admin/publish/' . $page->id . '/0','Unpublish',array('class'=>'btn small')) : 
	  HTML::link('admin/publish/' . $page->id . '/1','Publish',array('class'=>'btn small'));;
	echo '</div>';
	echo '</div>';
  }


echo '</div>';

echo '</div>';

?>