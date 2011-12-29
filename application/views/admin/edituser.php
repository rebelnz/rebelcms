<?php 
echo Form::open('admin/edituser','',array('class'=>'form-stacked'));
echo '<fieldset>';

echo '<div class="clearfix">';
echo Form::label('firstname','First Name');
echo '<div class="input">';
echo Form::text('firstname',$user->firstname,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Firstname';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('lastname','Last Name');
echo '<div class="input">';
echo Form::text('lastname',$user->lastname,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Lastname';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('email','Email');
echo '<div class="input">';
echo Form::text('email',$user->email,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Users email';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('role','Role');
echo '<div class="input">';
echo Form::select('role',$roleoptions,$user->role, array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'New Users Role';
echo '</span>';
echo '</div>';
echo '</div>';

echo Form::hidden('userid',$user->id); 

echo Form::submit('Save',array('class'=>'btn primary'));
echo Form::reset('Cancel',array('class'=>'btn'));

echo HTML::link('admin/deleteuser/' . $user->id,'Delete this User',array('class'=>'btn danger'));

echo '</fieldset>';
echo Form::close();

echo '<div>';
echo implode($errors->all('<p>:message</p>'));
echo '</div>';



?>