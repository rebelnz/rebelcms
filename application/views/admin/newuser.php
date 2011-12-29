<?php 
$firstname = Input::old('firstname');
$lastname = Input::old('lastname');
$email = Input::old('email');
$role = Input::old('role');

echo Form::open('admin/newuser','',array('class'=>'form-stacked'));
echo '<fieldset>';
echo '<legend>Add User</legend>';

echo '<div class="clearfix">';
echo Form::label('firstname','First Name');
echo '<div class="input">';
echo Form::text('firstname',$firstname,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Firstname';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('lastname','Last Name');
echo '<div class="input">';
echo Form::text('lastname',$lastname,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Lastname';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('email','Email');
echo '<div class="input">';
echo Form::text('email',$email,array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Users email';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('password','Password');
echo '<div class="input">';
echo Form::password('password',array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Password';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('password_confirmation','Confirm Password');
echo '<div class="input">';
echo Form::password('password_confirmation',array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'Confirm Password';
echo '</span>';
echo '</div>';
echo '</div>';

echo '<div class="clearfix">';
echo Form::label('role','Role');
echo '<div class="input">';
echo Form::select('role',$roleoptions,$role, array('class'=>'span3'));
echo '<span class="help-inline">';
echo 'New Users Role';
echo '</span>';
echo '</div>';
echo '</div>';


echo Form::submit('Save',array('class'=>'btn primary'));
echo Form::reset('Cancel',array('class'=>'btn'));

echo '</fieldset>';
echo Form::close();

echo '<div>';
echo implode($errors->all('<p>:message</p>'));
echo '</div>';


?>