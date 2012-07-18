<?php if ($member->isAdmin()): ?>
<div id="admin-panel">
	<a href="events/create">Create Event</a>
</div>
<?php endif; ?>
<table>
<thead>
<tr><td>Date</td><td>Event</td><td>Event location</td></tr>
</thead>
<tbody>
<?php if (count($events) == 0): ?>
<tr><td colspan="3">No Events found</td></tr>
<?php else: foreach ($events as $event): ?>
<tr><td><?php echo $event->start_date; ?></td><td><?php echo anchor("events/view/{$event->id}", $event->name) ?></td><td><?php echo $event->location; ?></td></tr>
<?php endforeach; endif; ?>
</tbody>
</table>
