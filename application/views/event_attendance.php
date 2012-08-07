<table>
	<thead>
	 	<tr>
			<td>Name</td><td>Surname</td><td>Date of Birth</td><td>Club</td>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($attendees as  $attendee) {
			echo "<tr><td>{$attendee->name}</td><td>{$attendee->surname}</td><td>{$attendee->birth_date}</td><td>{$attendee->club}</td></tr>";	
		}
	?>
	</tbody>
</table>