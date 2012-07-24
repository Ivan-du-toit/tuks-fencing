<div id="member_profile">
	<?php echo form_open('', array('method' => 'POST'), array('id' => $user->getID())); ?>
	<h3>Name: </h3>
	<?php echo $user->getName(); ?>
	
	<h3>Birth Date: </h3>
	<?php echo $user->getDateOfBirth(); ?>
	
	<h3>Weapons</h3>
	<?php echo implode(',', $user->getWeapons()); ?>
	
	<h3>Email</h3>
	<input name="email" value="<?php echo $user->getEmail(); ?>"/>
	</form>
</div>