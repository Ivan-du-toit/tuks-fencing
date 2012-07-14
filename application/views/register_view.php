<?php echo validation_errors(); ?>

<?php echo form_open('members/register'); ?>

<h4>E-Mail</h4>
<input type="email" required name="email" value="<?php echo set_value('email', ''); ?>" size="50" placeholder="Enter a valid email address"/>

<h4>Confirm E-Mail</h4>
<input type="email" required name="conf-email" value="<?php echo set_value('conf-email', ''); ?>" size="50" placeholder="Enter the same email address as above"/>

<h4>Password</h4>
<input type="password" required name="password" value="" size="50" />

<h4>Confirm Password</h4>
<input type="password" required name="conf-password" value="" size="50" />

<h4>Name</h4>
<input type="text" required name="name" value="<?php echo set_value('name', ''); ?>" size="50"/>

<h4>Surname</h4>
<input type="text" required name="surname" value="<?php echo set_value('surname', ''); ?>" size="50"/>


<h4>Date of Birth</h4>
<input type="date" name="DOB" value="<?php echo set_value('DOB', '1990-01-01'); ?>" size="50" />

<fieldset>
<legend>Weapon(s)</legend>
<input type="checkbox" name="weapons[]" value="Epee">Epee</input>
<input type="checkbox" name="weapons[]" value="Foil">Foil</input>
<input type="checkbox" name="weapons[]" value="Saber">Saber</input>
</fieldset>

<div><input type="submit" value="Submit" /></div>

</form>