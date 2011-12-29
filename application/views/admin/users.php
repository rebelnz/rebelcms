<?php 

echo '<table class="bordered-table">';
echo '<thead>';
   
echo '<tr>';
echo '<th>First Name</th>';
echo '<th>Last Name</th>';
echo '<th>Email</th>';
echo '<th>Role</th>';
echo '<th>Reset Password</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ( $users as $user )
  {
	echo '<tr>';

	echo '<td>';
	echo '<a rel="twipsy" title="Click name for editing options" href="edituser/' . $user->id . '">';
	echo $user->firstname;
	echo '</a>';
	echo '</td>'; 

	echo '<td>';
	echo $user->lastname;
	echo '</td>'; 

	echo '<td>';
	echo $user->email;
	echo '</td>'; 

	echo '<td>';
	echo $user->role;
	echo '</td>'; 

	echo '<td>';
	echo '<a rel="twipsy" title="Click to have new password emailed." href="resetpw/' . $user->id . '">';
	echo 'Reset';
	echo '</a>';
	echo '</td>'; 

	echo '</tr>';
  }
   
echo '</tbody>';
echo '</table>';

?>