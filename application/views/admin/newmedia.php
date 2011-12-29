<?php 
echo Form::open_for_files('admin/newmedia','',array('class'=>'form-stacked'));
echo '<fieldset>';
echo '<legend>Add Media</legend>';

echo '<div class="clearfix">';
echo Form::label('image','Image');
echo '<div class="input">';
echo Form::file('image');
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('caption','Caption');
echo '<div class="input">';
echo Form::text('caption','',array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Caption for image';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('meta','Meta');
echo '<div class="input">';
echo Form::text('meta','',array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Meta data for image';
echo '</span>';
echo '</div>';
echo '</div>';

echo Form::submit('Save',array('class'=>'btn primary'));
echo Form::reset('Cancel',array('class'=>'btn'));

echo '</fieldset>';
echo Form::close();



?>