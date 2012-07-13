<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TUKS Fencing Club</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script language="javascript" src="js/login.js"></script>
		<link rel="stylesheet" type="text/css" href="css/main_style.css"/>
	</head>
	<body>
		<div class="mainDiv">
			<div id="header">
				<img id="logo" src="images/TUKS_Fencing_Club_Header.png" alt="logo"/>
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
					<a href="#">HOME</a>
					<a href="#">EVENTS</a>
					<a href="#">NEWS</a>
					<a href="#">JOIN US</a>
					<a href="#">ABOUT US</a>
				</div>
			</div>
			<img src="images/mainBanner.jpg" alt="main banner"/>
			
			<img src="images/Join_Us.jpg" alt="Join Us"/>
			<img src="images/Events.jpg" alt="Events"/>
			<img src="images/About_Us.jpg" alt="About Us"/>
			
			<div id="latestNews">
			
			</div>
			
			<div id="footer">
			
			</div>
		</div>
	</body>
</html>