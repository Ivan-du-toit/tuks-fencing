<html>
<body>
<div id="content">
<table>
<thead>
<tr><td>Date</td><td>Event</td><td>Event location</td></tr>
</thead>
<tbody>
<?php foreach ($events as $event): ?>
<tr><td><?php echo $event->date; ?></td><td><?php echo anchor("events/view/{$event->id}", $event->name) ?>"</td><td><?php echo $event->location; ?></td></tr>
</tbody>
</table>
</div>
</body>
<html>