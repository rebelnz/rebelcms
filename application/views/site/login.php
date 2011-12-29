<?php

echo '<div id="login">';


echo Form::open('login', 'POST', array('class' => 'form-stacked') );

echo '<fieldset>';
echo '<legend>Login</legend>';

echo '<div class="clearfix">';
echo Form::label('email','Email Address',array('class'=>'description'));
echo '<div class="input">';
echo Form::text('email', '', array('class' => 'element text huge','maxlength' => '140' ));
echo '<span class="help-inline">';
echo 'Email';
echo '</span>';
echo '</div>';
echo '</div>';


echo '<div class="clearfix">';
echo Form::label('password','Password', array('class'=>'description'));
echo '<div class="input">';
echo Form::password('password',array('class' => 'element text huge','maxlength' => '140' ));
echo '<span class="help-inline">';
echo 'Password';
echo '</span>';
echo '</div>';
echo '</div>';

echo Form::submit('LOGIN',array('class' => 'btn primary','name' => 'submit')); 

echo '</fieldset>';
echo Form::close();
	  

if ( isset($errors) )
  {
	echo HTML::ul($errors);
  }
  
echo '</div>';


?>