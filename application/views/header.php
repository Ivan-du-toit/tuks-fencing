<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TUKS Fencing Club</title>
		<base href="<?php echo base_url(); ?>"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script language="javascript" src="js/login.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/main_style.css"/>
	</head>
	<body>
		<div class="mainDiv">
			<div id="header">
				<a href="<?php echo base_url(); ?>"><img id="logo" src="images/TUKS_Fencing_Club_Header.png" alt="logo"/></a>
				<?php if (!$member->isMember()) : ?>
				<div class="login_register">
					<a href="#" class="login_btn">Login<div class="triangle"></div></a>/<a href="<?php echo base_url(); ?>members/register">Register</a>
				</div>
				
				<?php else :?>
					<div class="member_box">
						<?php echo anchor("members/profile/{$member->getID()}", $member->getName());?>
						/<a href="members/logout">Logout</a>
					</div>
				<?php endif; ?>
				
                <div id="login_box">
                    <!--div id="login_box_content"></div-->
                    <div id="login_box_content">
                        <form id="login_form" action="members/login" method="POST">
                            <h2>Please enter your details</h2>
                            <input type="text" placeholder="Email" name="email"/>
                            <input type="password" placeholder="Password" name="password"/>
                            <input type="submit" value="Login!" />
                        </form>
                    </div>
                </div>
				<div class="headerLinks">
					<a href="<?php echo base_url(); ?>">HOME</a>
					<a href="events">EVENTS</a>
					<a href="news">NEWS</a>
					<a href="https://plus.google.com/b/106982813853449671040/106982813853449671040/photos">GALLERY</a>
					<a href="web/join_us">JOIN US</a>
					<a href="web/about_us">ABOUT US</a>
				</div>
			</div>
			<hr id="header_line" />
			<div id="content">