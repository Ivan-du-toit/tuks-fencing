<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TUKS Fencing Club</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script language="javascript" src="js/login.js"></script>
		<base href="<?php echo base_url(); ?>"/>
		<link rel="stylesheet" type="text/css" href="css/main_style.css"/>
	</head>
	<body>
		<div class="mainDiv">
			<div id="header">
				<a href="<?php echo base_url(); ?>"><img id="logo" src="images/TUKS_Fencing_Club_Header.png" alt="logo"/></a>
				<?php if (!$member->isMember()) : ?>
				<a href="#" class="login_btn"><span>Login</span><div class="triangle"></div></a>
                <div id="login_box">
                    <div id="login_box_content"></div>
                    <div id="login_box_content">
                        <form id="login_form" action="members/login" method="POST">
                            <h2>Please enter your details</h2>
                            <input type="text" placeholder="Email" name="email"/>
                            <input type="password" placeholder="Password" name="password"/>
                            <input type="submit" value="Login!" />
                        </form>
                    </div>
                </div>
				<?php else :?>
					<?php echo anchor("members/profile/{$member->getID()}", $member->getName());?>
				<?php endif; ?>
				<div class="headerLinks">
					<a href="<?php echo base_url(); ?>">HOME</a>
					<a href="events">EVENTS</a>
					<a href="news">NEWS</a>
					<a href="web/join-us">JOIN US</a>
					<a href="web/about-us">ABOUT US</a>
				</div>
			</div>
			<img src="images/mainBanner.jpg" alt="main banner"/>
			
			<a href="web/join_us"><img src="images/Join_Us.jpg" alt="Join Us"/></a>
			<a href="events"><img src="images/Events.jpg" alt="Events"/></a>
			<a href="web/about_us"><img src="images/About_Us.jpg" alt="About Us"/></a>
			
			<div id="latestNews">
			
			</div>
			
			<div id="footer">
			
			</div>
		</div>
	</body>
</html>