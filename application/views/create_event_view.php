<div id="create_event">
	<h2>Create New Event</h2>
	<?php echo validation_errors(); ?>
	
	<?php
	if (isset($event))
		echo form_open('events/edit/'.$event->id, array('method' => 'POST'), array('event_id' => $event->id));
	else
		echo form_open('events/create'); ?>
	
	<h4>Event Name</h4>
	<input class="create_event_offset" type="text" required name="event_name" value="<?php echo set_value('event_name', (isset($event))?$event->name:''); ?>" size="50" placeholder="Events name"/>
	<h4>Event Description</h4>
	<textarea class="create_event_offset" name="description" placeholder="Event description"><?php echo set_value('description',  (isset($event))?$event->description:''); ?></textarea>
	<h4>Event Location</h4>
	<textarea class="create_event_offset" name="location" required placeholder="Event location"><?php echo set_value('location', (isset($event))?$event->location:''); ?></textarea>
	<h4>Start Date</h4>
	<input class="create_event_offset" type="date" required name="start_date" value="<?php echo set_value('start_date', (isset($event))?$event->start_date:''); ?>" size="50" placeholder="Date of the first category"/>
	<h4>End Date</h4>
	<input class="create_event_offset" type="date" required name="end_date" value="<?php echo set_value('end_date', (isset($event))?$event->end_date:''); ?>" size="50" placeholder="Date of the last category"/>
	<script src="<?php echo base_url(); ?>js/angular-1.0.1.min.js"></script>
		<script>
			function TableCtrl($scope) {
			    $scope.categories = [
					<?php if (isset($event)) {
						$count=0;
						foreach ($categories as $category) {
							echo ($count==0)?'':',';
							echo "{'weapon':'{$category->weapon}', 'age':'{$category->age}', 'gender':'{$category->gender}', 'start_time': '{$category->start_time}', 'db_id':{$category->id}, 'id':{$count}}";
						$count++;
				}
					} else {
			        	echo "{'weapon':'Epee', 'age':'U13', 'gender':'Female', 'start_time':'', 'id':0, 'db_id': -1}";
					}
				?>];
			    $scope.weapons = ['Epee', 'Foil', 'Saber'];
			    $scope.ages = ['U13', 'U15', 'U17', 'U20', 'Senior', 'Veterans', 'Open'];
			    $scope.genders = ['Female', 'Male'];
			
			    $scope.addCategory = function() {
			        if ($scope.categories.length != 0)
			            var newId = $scope.categories[$scope.categories.length-1].id+1;
			        else
			            var newId = 0;
			        $scope.categories.push({'weapon':'Epee', 'age':'U13', 'gender':'Female', 'start_time':'', 'id':newId, 'db_id': -1});
			    };
			
			    $scope.removeCategory = function($id) {
			        var oldCategories = $scope.categories;
			        $scope.categories = [];
			        angular.forEach(oldCategories, function(category) {
			            //alert($id);
			            if (category.id != $id) $scope.categories.push(category);
			        });
			    };
			}
		</script>
	<hr id="create_event_table"/>
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
	<hr />
	<div><input type="submit" value="Submit" /></div>
	
	</form>
</div>