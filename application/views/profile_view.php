<h2>Member Profile: </h2>
<?php echo form_open('', array('method' => 'POST'), array('id' => $user->getID())); ?>
<h2>Name: </h2><?php echo $user->getName(); ?>

<h2>Birth Date: </h2><?php echo $user->getDateOfBirth(); ?>
</br>
</br>
<?php echo form_open('members/edit_profile', array('method' => 'POST')); ?>

<fieldset>
<legend><h2>Weapon(s)</h2></legend>
<input type="checkbox" name="weapons[]" value="Epee" <?php echo (in_array('Epee', $user->getWeapons())) ? 'checked' : ''; ?>>Epee</input>
<input type="checkbox" name="weapons[]" value="Foil" <?php echo (in_array('Foil', $user->getWeapons())) ? 'checked' : ''; ?>>Foil</input>
<input type="checkbox" name="weapons[]" value="Saber" <?php echo (in_array('Saber', $user->getWeapons())) ? 'checked' : ''; ?>>Saber</input>
</fieldset>

<h2>Email:</h2>
<input name="email" type="email" value="<?php echo $user->getEmail(); ?>"/>
</br></br>

<input type="submit" value="Update details"/>
</form>