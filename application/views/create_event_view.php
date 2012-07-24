<h2>Create New Event</h2>
<?php echo validation_errors(); ?>

<?php echo form_open('events/create'); ?>

<h4>Event Name</h4>
<input type="text" required name="event_name" value="<?php echo set_value('event_name', ''); ?>" size="50" placeholder="Events name"/>
<h4>Event Description</h4>
<textarea name="description" placeholder="Event description"><?php echo set_value('description', ''); ?></textarea>
<h4>Event Location</h4>
<textarea name="location" required placeholder="Event location"><?php echo set_value('location', ''); ?></textarea>
<h4>Start Date</h4>
<input type="date" required name="start_date" value="<?php echo set_value('start_date', ''); ?>" size="50" placeholder="Date of the first category"/>
<h4>End Date</h4>
<input type="date" required name="end_date" value="<?php echo set_value('end_date', ''); ?>" size="50" placeholder="Date of the last category"/>
<script src="<?php echo base_url(); ?>js/angular-1.0.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/table.js"></script>
<table ng-app ng-controller="TableCtrl">
    <thead>
        <tr><td>Weapon</td><td>Gender</td><td>Age Group</td><td>Start Time</td><td><input type="button" value="Add Category" ng-click="addCategory()"></td></tr>
    </thead>
    <tbody>
        <tr ng-repeat="cat in categories">
            <td>
                <select name="weapons[]">
                    <option ng-repeat="weapon in weapons" value="{{weapon}}" ng-selected="cat.weapon == weapon">{{weapon}}</option>
                </select>
            </td>
            <td>
                <select name="genders[]">
                    <option ng-repeat="gender in genders" value="{{gender}}" ng-selected="cat.gender == gender">{{gender}}</option>
                </select>
            </td>
            <td>
                <select name="ages[]">
                    <option ng-repeat="age in ages" value="{{age}}" ng-selected="cat.age == age">{{age}}</option>
                </select>
            </td>
			<td>
                <input name="start_times[]" type="datetime" value="{{start_time}}"/>
            </td>
            <td>
                <input type="button" value="Remove Category" ng-click="removeCategory(cat.id)">
            </td>
        </tr>
    </tbody>
</table>

<div><input type="submit" value="Submit" /></div>

</form>