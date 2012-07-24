<div id="member_profile">
	<?php echo validation_errors(); ?>
	<h2>Member Profile: </h2>
	<?php echo form_open('members/update_profile', array('method' => 'POST'), array('id' => $user->getID())); ?>
	<h3>Name: </h3><?php echo $user->getName(); ?>
	
	<h3>Birth Date: </h3><?php echo $user->getDateOfBirth(); ?>
	</br>
	</br>
	<?php echo form_open('members/edit_profile', array('method' => 'POST')); ?>
	
	<fieldset>
	<legend><h3>Weapon(s)</h3></legend>
	<input type="checkbox" name="weapons[]" value="Epee" <?php echo (in_array('Epee', $user->getWeapons())) ? 'checked' : ''; ?>>Epee</input>
	<input type="checkbox" name="weapons[]" value="Foil" <?php echo (in_array('Foil', $user->getWeapons())) ? 'checked' : ''; ?>>Foil</input>
	<input type="checkbox" name="weapons[]" value="Saber" <?php echo (in_array('Saber', $user->getWeapons())) ? 'checked' : ''; ?>>Saber</input>
	</fieldset>
	
	<h3>Email:</h3>
	<input name="email" type="email" value="<?php echo $user->getEmail(); ?>"/>
	<h3>Confirm Email:</h3>
	<input name="conf-email" type="email" value="<?php echo $user->getEmail(); ?>"/>
	<h3>Password:</h3>
	<input name="password" type="password""/>
	<h3>Confirm Email:</h3>
	<input name="conf-pass" type="password"/>
	
	</br></br>	
	<input id="member_update_submit" type="submit" value="Update details"/>
	</form>
</div>