<?php 

echo '<ul class="media-grid">';

foreach ( $files as $file )
  {
	echo '<li>';
	echo '<a rel="twipsy" title="Click image for editing options" href="editmedia/' . $file->id . '">';
	echo HTML::image('img/thumb_' . $file->filename, 'page image');
	echo '</a>';
	echo '</li>';
  }
echo '</ul>';

?>