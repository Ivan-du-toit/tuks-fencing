				<div class="offsetImg">
					<img id="main_banner" src="images/mainBanner.jpg" alt="main banner"/>
					<div id="wrapper" style="width: 950px; overflow: hidden;">
						<div style="width: 525px; float: left;">
						
							<a href="web/join_us"><img src="images/Join_Us.jpg" alt="Join Us"/></a>
							<a href="events"><img src="images/Events.jpg" alt="Events"/></a>
							<a href="web/about_us"><img src="images/About_Us.jpg" alt="About Us"/></a>
						</div>
						<div id="latestNews" style="overflow: hidden;">
							<h2>Latest News</h2>
							<hr />
							<?php foreach ($entries as $entry) :?>
							<h3><?php echo $entry->title; ?></h3>
							<p id="latest_news_time"><?php echo 'Posted on '.$entry->date; ?></p>
							<hr />
							<p><?php echo $entry->content; ?></p>
							<?php endforeach; ?>
							
							
						</div>
					</div>
				
				</div>
				
				