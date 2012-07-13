<html>
<body>
<div id="content">
<h3><?php echo $event->name; ?></h3>
<p><?php echo $event->description; ?></p>
<?php 
echo form_open('event/attend');
foreach ($event as $gender=>$categories) : ?>
<h3><?php echo $gender; ?></h3>
<table>
<thead>
<tr><td>Age Group</td><td>Weapon</td><td>Start time</td><<td>Attend Event</td></tr>
</thead>
<tbody>
<?php foreach ($categories as $category): ?>
<tr><td><?php echo $category->age; ?></td><td><?php echo $category->$weapon; ?></td><td><?php echo $category->$start_time; ?></td><td><input type="checkbox" value="<?php echo $category->id; ?>" name="categories[]"/></td></tr>
</tbody>
</table>
<?php endforeach; ?>
</form>
</div>
</body>
<html>