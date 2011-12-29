<?php 

echo '<div class="row">';
echo '<div class="span1/3">';
echo HTML::image('img/medium_'. $media->filename, 'Image');

echo '</div>';

echo '<div class="span2/3">';

echo Form::open('admin/editmedia','',array('class'=>'form-stacked'));
echo '<fieldset>';

echo '<div class="clearfix">';
echo Form::label('caption','Caption');
echo '<div class="input">';
echo Form::text('caption',$media->caption,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Caption for image';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('meta','Meta');
echo '<div class="input">';
echo Form::text('meta',$media->meta,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Meta data for image';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('page','Page');
echo '<div class="input">';
echo Form::select('page', $options, $currentpage[0]->page_id, array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Page to display image';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('size','Size');
echo '<div class="input">';
echo Form::select('size', array('1'=>'Original','2'=>'Medium'),$media->size,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Image size to display';
echo '</span>';
echo '</div>';
echo '</div>';

echo Form::hidden('mediaid',$media->id); 

echo Form::submit('Save',array('class'=>'btn primary'));
echo Form::reset('Cancel',array('class'=>'btn'));

echo HTML::link('admin/deletemedia/' . $media->id,'Delete this Image',array('class'=>'btn danger'));

echo '</fieldset>';
echo Form::close();

echo '</div>';
echo '</div>';


?>