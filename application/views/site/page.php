<?php

echo '<div class="content">';

echo '<div class="page-header">';
echo '<h1>';
echo $page->title;
echo '</h1>';
echo '</div>';

echo '<div class="row">';

echo '<div class="span10">';
echo '<p>';
echo $page->content;
echo '</p>';


foreach ( $media as $m ) {
  if ( $m->size === '1' ) {
	echo HTML::image('img/' . $m->filename, $m->meta);
  } else {
	echo HTML::image('img/medium_' . $m->filename,$m->caption);
  }
  echo '<p>';
  echo $m->caption; 
  echo '</p>';  
}

echo '</div>';

echo '<div class="span4">';
echo '<h3>';
echo $page->summary;
echo '</h3>';
echo '</div>';

echo '</div>';
echo '</div>';

 ?>