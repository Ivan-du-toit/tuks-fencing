<h2>Member Login: </h2>
<?php echo validation_errors(); ?>

<?php if (isset($error)) echo $error; ?>

<?php echo form_open('members/login'); ?>

<h4>E-Mail</h4>
<input type="email" required name="email" value="<?php echo set_value('email', ''); ?>" size="50" />

<h4>Password</h4>
<input type="password" required name="password" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>