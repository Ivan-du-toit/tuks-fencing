<h2><?php echo $event->name; ?></h2>
<p><?php echo $event->description; ?></p>
<?php if ($member->isAdmin()): ?>
	<a href="events/attendance/<?php echo $event->id; ?>">View Attendance</a>
<?php endif; ?>
<?php echo form_open('events/attend', array('method'=>'post'), array('event_id' => $event->id)); ?>
<table>
<thead>
<tr><td>Gender</td><td>Age Group</td><td>Weapon</td><td>Start time</td<?php if ($member->isMember()): ?>><td>Attend Category</td><?php endif; ?></tr>
</thead>
<tbody>
<?php foreach ($categories as $category): ?>
<tr><td><?php echo $category->gender; ?></td><td><?php echo $category->age; ?></td><td><?php echo $category->weapon; ?></td><td><?php echo $category->start_time; ?></td><?php if ($member->isMember()): ?><td><?php echo form_checkbox('categories[]', $category->id, $category->attend); ?></td><?php endif; ?></tr>
<?php endforeach; ?>
</tbody>
</table>
<input type="submit" value="Attend Selected Categories"/>
</form>