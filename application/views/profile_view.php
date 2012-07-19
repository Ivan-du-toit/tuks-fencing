<h3>Name: </h3><?php echo $user->getName(); ?>

<h3>Birth Date: </h3><?php echo $user->getDateOfBirth(); ?>

<h3>Weapons</h3>
<?php echo implode(',', $user->getWeapons()); ?>