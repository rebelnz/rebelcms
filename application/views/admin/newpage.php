<?php 
echo Form::open('admin/newpage','',array('class'=>'form-stacked'));
echo '<fieldset>';

if ( ! $page ) {	
	echo '<legend>Add New Page</legend>';
  }
else {
	echo '<legend>Edit ' . $page->title . '</legend>';
}

echo '<div class="clearfix">';
echo Form::label('slug','Slug');
echo '<div class="input">';
echo Form::text('slug',$page->slug);
echo '<span class="help-inline">';
echo $errors->first('slug');
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('title','Title');
echo '<div class="input">';
echo Form::text('title',$page->title);
echo '<span class="help-inline">';
echo $errors->first('title');
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('summary','Summary');
echo '<div class="input">';
echo Form::textarea('summary',$page->summary,array('class'=>'span6','rows'=>'3'));
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('content','Content');
echo '<div class="input">';
echo Form::textarea('content',$page->content,array('class'=>'xxlarge span6'));
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('publish','Publish');
echo '<div class="input">';
echo Form::checkbox('publish','1');
echo '</div>';
echo '</div>';

echo Form::hidden('pageid',$page->id);

echo Form::submit('Save',array('class'=>'btn primary'));
echo Form::reset('Cancel',array('class'=>'btn'));

echo '</fieldset>';
echo Form::close();



?>