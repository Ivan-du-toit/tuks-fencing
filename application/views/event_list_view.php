<h2>Event Calendar</h2>
<?php if ($member->isAdmin()): ?>
<div id="admin-panel">
	<a href="events/create">Create Event</a>
</div>
<?php endif; ?>
<table>
<thead>
<tr><td>Start Date</td><td>End Date</td><td>Event Name</td><td>Location</td><td>Description</td><?php if ($member->isAdmin()) echo '<td>Actions</td>'; ?></tr>
</thead>
<tbody>
<?php if (count($events) == 0): ?>
<tr><td colspan="5">No Events found</td></tr>
<?php else: foreach ($events as $event): ?>
<tr><td><?php echo $event->start_date; ?></td><td><?php echo $event->end_date; ?></td><td><?php echo anchor("events/view/{$event->id}", $event->name) ?></td><td><?php echo $event->location; ?></td><td><?php echo $event->description; ?></td><?php if ($member->isAdmin()) echo '<td><a href="events/edit/'.$event->id.'">Edit</a> <a href="events/delete/'.$event->id.'">Delete</a></td>'; ?></tr>
<?php endforeach; endif; ?>
</tbody>
</table>
