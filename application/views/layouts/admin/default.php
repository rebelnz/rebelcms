<?php
echo $header;

echo '<h1>Admin</h1>';
echo '<div id="nav">';

echo '<ul class="tabs">'; 

echo '<li>';

echo '<li>';
echo HTML::link('/','Site');
echo '</li>';

echo '<li>';
echo HTML::link('/admin/pages','Pages');
echo '</li>';

echo '<li>';
echo HTML::link('/admin/media','Images/Media');
echo '</li>';

echo '<li>';
echo HTML::link('/admin/users','Users');
echo '</li>';

echo '<li>';
echo HTML::link('/admin/newpage','New Page');
echo '</li>';

echo '<li>';
echo HTML::link('/admin/newmedia','New Media');
echo '</li>';

echo '<li>';
echo HTML::link('/admin/newuser','New User');
echo '</li>';

echo '<li>';
echo HTML::link('/logout','Logout');
echo '</li>';

echo '</ul>';
echo '</div>';

echo $content;
echo $footer;
?>