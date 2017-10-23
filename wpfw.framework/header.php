<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head>
		
		<!-- meta headers -->
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|IM+Fell+French+Canon' rel='stylesheet' type='text/css' />
			
		<!-- RSS and pingback settings -->		
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />		
		
		<!-- favincon -->
		<link rel="shortcut icon" href="<?php echo of_get_option("favicon");?>" />
		
		<?php wp_head(); ?>
		
	</head>
	
	<body <?php body_class(); ?>>

			<div id="WebsiteWrap" class="<?php echo of_get_option("layout_style"); ?>">
				
				<!-- Header Start -->
				<header>
					<div id="HeaderContainer" <?php if(get_header_image()) { ?>style="background: url(<?php header_image(); ?>) center top no-repeat;"<?php } ?>>
						<div id="Header" class="WebsiteWidth">
							<ul class="socials 
												 <?php if (of_get_option("logowidth") > 355) { echo 'top'; } ?>
												 <?php echo of_get_option("socialiconsstyle"); ?>">
								<?php
								$monosocials = array('fivehundredpx', 'aboutme', 'addme', 'amazon', 'aol', 'appstorealt', 'appstore', 'apple', 'bebo', 'behance', 'bing', 'blip', 'blogger', 'coroflot', 'daytum', 'delicious', 'designbump', 'designfloat', 'deviantart', 'diggalt', 'digg', 'dribble', 'drupal', 'ebay', 'email', 'emberapp', 'etsy', 'facebook', 'feedburner', 'flickr', 'foodspotting', 'forrst', 'foursquare', 'friendsfeed', 'friendstar', 'gdgt', 'github', 'githubalt', 'googlebuzz', 'googleplus', 'googletalk', 'gowallapin', 'gowalla', 'grooveshark', 'heart', 'hyves', 'icondock', 'icq', 'identica', 'imessage', 'itunes', 'lastfm', 'linkedin', 'meetup', 'metacafe', 'mixx', 'mobileme', 'mrwong', 'msn', 'myspace', 'newsvine', 'paypal', 'photobucket', 'picasa', 'pinterest', 'podcast', 'posterous', 'qik', 'quora', 'reddit', 'retweet', 'rss', 'scribd', 'sharethis', 'skype', 'slashdot', 'slideshare', 'smugmug', 'soundcloud', 'spotify', 'squidoo', 'stackoverflow', 'star', 'stumbleupon', 'technorati', 'tumblr', 'twitterbird', 'twitter', 'viddler', 'vimeo', 'virb', 'www', 'wikipedia', 'windows', 'wordpress', 'xing', 'yahoobuzz', 'yahoo', 'yelp', 'youtube', 'instagram');
								foreach($monosocials as $ms) {
									if (of_get_option("s_".$ms)) { 
									?>
										<li><a class="monosocial monosocial-<?php echo $ms; ?>" href="<?php echo of_get_option("s_".$ms); ?>"></a></li>
									<?php 
									} 
								}
								?>
							</ul>
							<div class="PhoneNumber"><?php echo of_get_option("phonenumber"); ?></div>
							<!-- Logo Start -->
							<?php if (of_get_option("logo")) { ?>
							<a id="Logo" href="<?php echo site_url(); ?>"><img src="<?php echo of_get_option("logo"); ?>" alt="<?php bloginfo('name'); ?> Homepage" /></a>
							<?php } else { ?>
							<h1 id="Logo"><a href="<?php echo site_url(); ?>"><?php echo get_option("blogname"); ?></a></h1>
							<?php } ?>
							<!-- Logo End -->
							<h2 id="Headline"><?php echo get_option("blogdescription"); ?></h2>
						</div>
					</div>
				</header>
				<!-- Header End -->
				
				<!-- Main Menu Start -->
						<div id="MainMenu">
							<nav class="navbar navbar-default" role="navigation">
								<form action="<?php echo site_url(); ?>" method="get" class="navbar-form navbar-right" role="search">
			            <div class="form-group">
			              <input type="text" class="form-control" placeholder="Search" name="s">
			            </div>
			            <button type="submit" class="btn btn-default">Submit</button>
			          </form>								
								<?php 
								if ( has_nav_menu('main_menu') ) {
									wp_nav_menu(
										array("theme_location" => "main_menu",
													"depth" => 0,
													"container" => "div",
                					"container_class" => "collapse navbar-collapse",
        									"container_id" => "MainMenuContainer",
        									"menu_class" => "nav navbar-nav",
													"menu_id" => "",
        									"fallback_cb" => "wp_bootstrap_navwalker::fallback",
													"walker" => new wp_bootstrap_navwalker)
									); 
								} 
								?>

							</nav>
						</div>
				<!-- Main Menu End -->
	
				<?php if (!is_home()) { ?>
				<?php if (is_page()) { ?>
				<?php 
				if (getmb("hidetitle", get_queried_object_id()) != 'no' && getmb("hidetitle", get_queried_object_id()) != 'content') { ?>
					<div id="TopContentShadow">
						<div id="TopContentContainer">
							<h1 class="WebsiteWidth"><?php the_title(); ?></h1>
						</div>
					</div>
				<?php } ?>
				<?php } ?>
				
				<!-- Main Wrap Start -->
				<section>
					<div id="MainWrapContainer">
						<div id="MainWrap" class="WebsiteWidth">
				<?php } ?>