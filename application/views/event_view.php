<h3><?php echo $event->name; ?></h3>
<p><?php echo $event->description; ?></p>
<?php echo form_open('events/attend', array('method'=>'post'), array('event_id' => $event->id)); ?>
<table>
<thead>
<tr><td>Gender</td><td>Age Group</td><td>Weapon</td><td>Start time</td><td>Attend Category</td></tr>
</thead>
<tbody>
<?php foreach ($categories as $category): ?>
<tr><td><?php echo $category->gender; ?></td><td><?php echo $category->age; ?></td><td><?php echo $category->weapon; ?></td><td><?php echo $category->start_time; ?></td><td><?php echo form_checkbox('categories[]', $category->id, $category->attend); ?></td></tr>
<?php endforeach; ?>
</tbody>
</table>
<input type="submit" value="Attend Selected Categories"/>
</form>